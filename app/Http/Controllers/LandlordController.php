<?php

namespace App\Http\Controllers;

use App\Models\Landlord;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Property;

class LandlordController extends Controller
{
    public function showLoginForm()
    {
        return view('landlord.landlord_login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::guard('landlord')->attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();
            return redirect()->intended(route('landlord.dashboard'));
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function dashboard()
    {
        return view('landlord.landlord_dashboard');
    }

    public function logout(Request $request)
    {
        Auth::guard('landlord')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('landlord.login');
    }

    public function showRegisterForm()
    {
        return view('landlord.landlord_register');
    }

    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:landlords,email'],
            'phone' => ['nullable', 'string', 'max:50'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);

        $landlord = Landlord::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'] ?? null,
            'password' => Hash::make($validated['password']),
        ]);

        Auth::guard('landlord')->login($landlord);
        $request->session()->regenerate();

        return redirect()->route('landlord.dashboard');
    }

    public function createProperty()
    {
        return view('landlord.property_create');
    }

    public function storeProperty(Request $request)
    {
        $validated = $request->validate([
            'location' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,gif,webp', 'max:5120'],
            'area' => ['nullable', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:255'],
            'rent' => ['required', 'numeric', 'min:0'],
            'number_of_rooms' => ['required', 'integer', 'min:0'],
            'number_of_washrooms' => ['required', 'integer', 'min:0'],
            'floor_number' => ['required', 'integer', 'min:0'],
            'balcony' => ['required', 'integer', 'min:0'],
            'gas_system' => ['required', 'string', 'max:255'],
            'electricity' => ['required', 'string', 'max:255'],
            'service_charge' => ['nullable', 'numeric', 'min:0'],
        ]);

        $landlordId = Auth::guard('landlord')->id();

        // Handle image upload if present
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('properties', 'public');
            $validated['image'] = $path; // save storage path into DB
        }

        Property::create(array_merge($validated, [
            'landlord_id' => $landlordId,
            'status' => 'pending',
        ]));

        return redirect()->route('landlord.dashboard')->with('status', 'Property listed successfully.');
    }
}


