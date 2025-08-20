<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; // Assuming your User model is in this location
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use App\Models\Property;

class CustomerController extends Controller
{
    /**
     * Show the customer login form.
     */
    public function loginForm()
    {
        return view('customer.customer_login');
    }

    /**
     * Show the customer registration form.
     */
    public function registerForm()
    {
        // We will create this view later
        return view('customer.customer_register');
    }

    /**
     * Handle a customer login request.
     */
    public function login(Request $request)
    {
        // Validate the form data
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Attempt to log the customer in
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $request->session()->regenerate();

            // Redirect to the intended page (e.g., customer dashboard)
            return redirect()->intended('/customer/dashboard');
        }

        // If login attempt fails, redirect back with an error message
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    /**
     * Handle a customer registration request.
     */
    public function register(Request $request)
    {
        // Validate the registration form data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'nullable|string|max:255',
            'password' => 'required|string|min:6|confirmed',
        ]);

        // Create the new user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
        ]);

        // Log the new user in
        Auth::login($user);

        // Redirect to the customer dashboard or a welcome page
        return redirect('/customer/dashboard');
    }

    /**
     * Handle a customer logout request.
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }

    /**
     * Show the customer dashboard with property listings.
     */
    public function dashboard(Request $request)
    {
        $search = $request->input('q');

        $properties = Property::with(['landlord', 'reviews.user'])
            ->where('status', 'approved')
            ->when($search, function ($query) use ($search) {
                $query->where(function ($q) use ($search) {
                    $q->where('location', 'like', '%'.$search.'%')
                        ->orWhere('city', 'like', '%'.$search.'%')
                        ->orWhere('area', 'like', '%'.$search.'%')
                        ->orWhere('description', 'like', '%'.$search.'%')
                        ->orWhere('gas_system', 'like', '%'.$search.'%')
                        ->orWhere('electricity', 'like', '%'.$search.'%');
                });
            })
            // City / Location / Area exact or partial matches
            ->when($request->filled('city'), fn($q) => $q->where('city', 'like', '%'.$request->input('city').'%'))
            ->when($request->filled('location'), fn($q) => $q->where('location', 'like', '%'.$request->input('location').'%'))
            ->when($request->filled('area'), fn($q) => $q->where('area', 'like', '%'.$request->input('area').'%'))
            // Rent range
            ->when($request->filled('min_rent'), fn($q) => $q->where('rent', '>=', (float) $request->input('min_rent')))
            ->when($request->filled('max_rent'), fn($q) => $q->where('rent', '<=', (float) $request->input('max_rent')))
            // Rooms range
            ->when($request->filled('rooms_min'), fn($q) => $q->where('number_of_rooms', '>=', (int) $request->input('rooms_min')))
            ->when($request->filled('rooms_max'), fn($q) => $q->where('number_of_rooms', '<=', (int) $request->input('rooms_max')))
            // Washrooms range
            ->when($request->filled('washrooms_min'), fn($q) => $q->where('number_of_washrooms', '>=', (int) $request->input('washrooms_min')))
            ->when($request->filled('washrooms_max'), fn($q) => $q->where('number_of_washrooms', '<=', (int) $request->input('washrooms_max')))
            // Floor range
            ->when($request->filled('floor_min'), fn($q) => $q->where('floor_number', '>=', (int) $request->input('floor_min')))
            ->when($request->filled('floor_max'), fn($q) => $q->where('floor_number', '<=', (int) $request->input('floor_max')))
            // Balcony range
            ->when($request->filled('balcony_min'), fn($q) => $q->where('balcony', '>=', (int) $request->input('balcony_min')))
            ->when($request->filled('balcony_max'), fn($q) => $q->where('balcony', '<=', (int) $request->input('balcony_max')))
            // Gas system and electricity exact match
            ->when($request->filled('gas_system'), fn($q) => $q->where('gas_system', $request->input('gas_system')))
            ->when($request->filled('electricity'), fn($q) => $q->where('electricity', $request->input('electricity')))
            // Service charge range
            ->when($request->filled('service_charge_min'), fn($q) => $q->where('service_charge', '>=', (float) $request->input('service_charge_min')))
            ->when($request->filled('service_charge_max'), fn($q) => $q->where('service_charge', '<=', (float) $request->input('service_charge_max')))
            // With image only
            ->when($request->boolean('has_image'), function ($q) {
                $q->whereNotNull('image')->where('image', '!=', '');
            })
            ->latest()
            ->take(24)
            ->get();

        return view('customer.customer_dashboard', compact('properties', 'search'));
    }

    public function storeReview(Request $request, Property $property)
    {
        $data = $request->validate([
            'rating' => ['required', 'integer', 'min:1', 'max:5'],
            'review_text' => ['nullable', 'string', 'max:2000'],
        ]);

        $user = Auth::user();

        \App\Models\Review::create([
            'landlord_id' => $property->landlord_id,
            'user_id' => $user->id,
            'property_id' => $property->id,
            'review_text' => $data['review_text'] ?? null,
            'rating' => $data['rating'],
        ]);

        return back()->with('status', 'Review submitted successfully.');
    }
}

