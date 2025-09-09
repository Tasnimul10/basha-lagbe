<?php

namespace App\Http\Controllers;

use App\Models\Landlord;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Property;
use App\Models\Booking;
use App\Models\Message;
use App\Models\User;

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
        $landlord = auth('landlord')->user();
        $properties = $landlord->properties()->latest()->get();
        $totalProperties = $properties->count();
        $totalBookings = $landlord->bookings()->count();
        $pendingBookings = $landlord->bookings()->where('status', 'pending')->count();
        
        return view('landlord.landlord_dashboard', compact('properties', 'totalProperties', 'totalBookings', 'pendingBookings'));
    }

    public function properties()
    {
        $landlord = auth('landlord')->user();
        $properties = $landlord->properties()->latest()->paginate(12);
        
        return view('landlord.properties', compact('properties'));
    }

    public function editProperty(Property $property)
    {
        $landlord = auth('landlord')->user();
        
        // Verify the property belongs to this landlord
        if ($property->landlord_id !== $landlord->id) {
            abort(403, 'Unauthorized');
        }
        
        return view('landlord.property_edit', compact('property'));
    }

    public function updateProperty(Request $request, Property $property)
    {
        $landlord = auth('landlord')->user();
        
        // Verify the property belongs to this landlord
        if ($property->landlord_id !== $landlord->id) {
            abort(403, 'Unauthorized');
        }
        
        $request->validate([
            'location' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'rent' => 'required|numeric|min:0',
            'number_of_rooms' => 'required|integer|min:1',
            'number_of_washrooms' => 'required|integer|min:1',
            'description' => 'nullable|string',
            'property_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
        
        $data = $request->only(['location', 'city', 'rent', 'number_of_rooms', 'number_of_washrooms', 'description']);
        
        if ($request->hasFile('property_image')) {
            $imageName = time().'.'.$request->property_image->extension();
            $request->property_image->move(public_path('images'), $imageName);
            $data['property_image'] = $imageName;
        }
        
        $property->update($data);
        
        return redirect()->route('landlord.properties.index')->with('success', 'Property updated successfully!');
    }

    public function deleteProperty(Property $property)
    {
        $landlord = auth('landlord')->user();
        
        // Verify the property belongs to this landlord
        if ($property->landlord_id !== $landlord->id) {
            abort(403, 'Unauthorized');
        }
        
        // Delete the property image if it exists
        if ($property->property_image && file_exists(public_path('images/'.$property->property_image))) {
            unlink(public_path('images/'.$property->property_image));
        }
        
        $property->delete();
        
        return redirect()->route('landlord.properties.index')->with('success', 'Property deleted successfully!');
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

    public function bookings()
    {
        $landlord = auth('landlord')->user();
        $bookings = $landlord->bookings()
            ->with(['user', 'property'])
            ->orderBy('created_at', 'desc')
            ->get();
        
        return view('landlord.bookings', compact('bookings'));
    }

    public function updateBookingStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:pending,confirmed,cancelled,completed,rejected'
        ]);

        $booking = Booking::where('landlord_id', auth('landlord')->id())
            ->findOrFail($id);
        
        $booking->update([
            'status' => $request->status
        ]);

        return redirect()->back()->with('success', 'Booking status updated successfully!');
    }

    /**
     * Send message to customer
     */
    public function sendMessage(Request $request, Property $property, $customerId)
    {
        $request->validate([
            'message' => 'required|string|max:1000'
        ]);

        $landlord = auth('landlord')->user();
        
        // Verify the property belongs to this landlord
        if ($property->landlord_id !== $landlord->id) {
            abort(403, 'Unauthorized');
        }
        
        Message::create([
            'property_id' => $property->id,
            'customer_id' => $customerId,
            'landlord_id' => $landlord->id,
            'message' => $request->message,
            'sender_type' => 'landlord'
        ]);

        return back()->with('success', 'Message sent successfully!');
    }

    /**
     * View messages for a property with a customer
     */
    public function viewMessages(Property $property, $customerId)
    {
        $landlord = auth('landlord')->user();
        
        // Verify the property belongs to this landlord
        if ($property->landlord_id !== $landlord->id) {
            abort(403, 'Unauthorized');
        }
        
        $messages = Message::where('property_id', $property->id)
            ->where('customer_id', $customerId)
            ->with(['customer', 'landlord'])
            ->orderBy('created_at', 'asc')
            ->get();

        // Mark messages as read
        Message::where('property_id', $property->id)
            ->where('customer_id', $customerId)
            ->where('sender_type', 'customer')
            ->where('is_read', false)
            ->update(['is_read' => true]);

        $customer = User::findOrFail($customerId);

        return view('landlord.messages', compact('property', 'messages', 'customer'));
    }

    /**
     * Get all message conversations
     */
    public function myMessages()
    {
        $landlord = auth('landlord')->user();
        
        $conversations = Message::where('landlord_id', $landlord->id)
            ->with(['property', 'customer'])
            ->select('property_id', 'customer_id')
            ->groupBy('property_id', 'customer_id')
            ->get()
            ->map(function ($conversation) use ($landlord) {
                $lastMessage = Message::where('property_id', $conversation->property_id)
                    ->where('customer_id', $conversation->customer_id)
                    ->orderBy('created_at', 'desc')
                    ->first();
                
                $unreadCount = Message::where('property_id', $conversation->property_id)
                    ->where('customer_id', $conversation->customer_id)
                    ->where('sender_type', 'customer')
                    ->where('is_read', false)
                    ->count();
                
                return [
                    'property' => $conversation->property,
                    'customer' => $conversation->customer,
                    'last_message' => $lastMessage,
                    'unread_count' => $unreadCount
                ];
            });

        return view('landlord.my_messages', compact('conversations'));
    }
}


