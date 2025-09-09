<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; // Assuming your User model is in this location
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use App\Models\Property;
use App\Models\Booking;
use App\Models\Message;
use App\Models\Landlord;

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

        // Get comparison list from session
        $compareList = $request->session()->get('compare_properties', []);
        
        // Get user's favorites
        $user = auth()->user();
        $favoriteIds = $user ? $user->favorites()->pluck('property_id')->toArray() : [];
        
        return view('customer.customer_dashboard', compact('properties', 'search', 'compareList', 'favoriteIds'));
    }

    /**
     * Show property details page
     */
    public function propertyDetails(Property $property)
    {
        // Load property with relationships
        $property->load(['landlord', 'reviews.user']);
        
        // Get user's favorites
        $user = auth()->user();
        $favoriteIds = $user ? $user->favorites()->pluck('property_id')->toArray() : [];
        
        return view('customer.property_details', compact('property', 'favoriteIds'));
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

    /**
     * Add property to comparison list
     */
    public function addToCompare(Request $request, Property $property)
    {
        $compareList = $request->session()->get('compare_properties', []);
        
        // Limit to maximum 3 properties for comparison
        if (count($compareList) >= 3) {
            return back()->with('error', 'You can compare maximum 3 properties at a time.');
        }
        
        // Check if property is already in comparison list
        if (!in_array($property->id, $compareList)) {
            $compareList[] = $property->id;
            $request->session()->put('compare_properties', $compareList);
            return back()->with('success', 'Property added to comparison list.');
        }
        
        return back()->with('info', 'Property is already in comparison list.');
    }

    /**
     * Remove property from comparison list
     */
    public function removeFromCompare(Request $request, Property $property)
    {
        $compareList = $request->session()->get('compare_properties', []);
        $compareList = array_diff($compareList, [$property->id]);
        $request->session()->put('compare_properties', array_values($compareList));
        
        return back()->with('success', 'Property removed from comparison list.');
    }

    /**
     * Show comparison page
     */
    public function compare(Request $request)
    {
        $compareList = $request->session()->get('compare_properties', []);
        
        if (empty($compareList)) {
            return redirect()->route('customer.dashboard')->with('info', 'No properties selected for comparison.');
        }
        
        $properties = Property::with(['landlord', 'reviews'])
            ->whereIn('id', $compareList)
            ->where('status', 'approved')
            ->get();
        
        return view('customer.compare', compact('properties'));
    }

    /**
     * Clear all properties from comparison list
     */
    public function clearCompare(Request $request)
    {
        $request->session()->forget('compare_properties');
        return redirect()->route('customer.dashboard')->with('success', 'Comparison list cleared.');
    }

    /**
     * Add property to favorites
     */
    public function addToFavorites(Property $property)
    {
        $user = auth()->user();
        
        if (!$user->favorites()->where('property_id', $property->id)->exists()) {
            $user->favorites()->attach($property->id);
            return back()->with('success', 'Property added to favorites!');
        }
        
        return back()->with('info', 'Property is already in your favorites.');
    }

    /**
     * Remove property from favorites
     */
    public function removeFromFavorites(Property $property)
    {
        $user = auth()->user();
        $user->favorites()->detach($property->id);
        
        return back()->with('success', 'Property removed from favorites.');
    }

    /**
     * Show favorites page
     */
    public function favorites()
    {
        $user = auth()->user();
        $favorites = $user->favorites()
            ->with(['landlord', 'reviews'])
            ->where('status', 'approved')
            ->get();
        
        return view('customer.favorites', compact('favorites'));
    }

    public function bookProperty(Request $request, Property $property)
    {
        $request->validate([
            'visit_date' => 'required|date|after:today',
            'message' => 'nullable|string|max:1000',
        ]);

        Booking::create([
            'user_id' => auth()->id(),
            'property_id' => $property->id,
            'landlord_id' => $property->landlord_id,
            'visit_date' => $request->visit_date,
            'message' => $request->message,
            'status' => 'pending',
        ]);

        return redirect()->back()->with('success', 'Visit request sent successfully!');
    }

    public function myBookings()
    {
        $user = auth()->user();
        $bookings = $user->bookings()
            ->with(['property', 'landlord'])
            ->orderBy('created_at', 'desc')
            ->get();
        
        return view('customer.bookings', compact('bookings'));
    }

    /**
     * Send message to landlord
     */
    public function sendMessage(Request $request, Property $property)
    {
        $request->validate([
            'message' => 'required|string|max:1000'
        ]);

        $user = auth()->user();
        
        Message::create([
            'property_id' => $property->id,
            'customer_id' => $user->id,
            'landlord_id' => $property->landlord_id,
            'message' => $request->message,
            'sender_type' => 'customer'
        ]);

        return back()->with('success', 'Message sent successfully!');
    }

    /**
     * View messages for a property
     */
    public function viewMessages(Property $property)
    {
        $user = auth()->user();
        
        $messages = Message::where('property_id', $property->id)
            ->where('customer_id', $user->id)
            ->with(['customer', 'landlord'])
            ->orderBy('created_at', 'asc')
            ->get();

        // Mark messages as read
        Message::where('property_id', $property->id)
            ->where('customer_id', $user->id)
            ->where('sender_type', 'landlord')
            ->where('is_read', false)
            ->update(['is_read' => true]);

        $landlord = Landlord::findOrFail($property->landlord_id);

        return view('customer.property_messages', compact('property', 'messages', 'landlord'));
    }

    /**
     * Get all message conversations
     */
    public function myMessages()
    {
        $user = auth()->user();
        
        $conversations = Message::where('customer_id', $user->id)
            ->with(['property', 'landlord'])
            ->select('property_id', 'landlord_id')
            ->groupBy('property_id', 'landlord_id')
            ->get()
            ->map(function ($conversation) use ($user) {
                $lastMessage = Message::where('property_id', $conversation->property_id)
                    ->where('customer_id', $user->id)
                    ->orderBy('created_at', 'desc')
                    ->first();
                
                $unreadCount = Message::where('property_id', $conversation->property_id)
                    ->where('customer_id', $user->id)
                    ->where('sender_type', 'landlord')
                    ->where('is_read', false)
                    ->count();
                
                return [
                    'property' => $conversation->property,
                    'landlord' => $conversation->landlord,
                    'last_message' => $lastMessage,
                    'unread_count' => $unreadCount
                ];
            });

        return view('customer.messages', compact('conversations'));
    }

    /**
     * Handle property report submission
     */
    public function reportProperty(Request $request, Property $property)
    {
        $request->validate([
            'reason' => 'required|string|in:inappropriate_content,false_information,spam,fraud,duplicate,other',
            'description' => 'nullable|string|max:1000'
        ]);

        // Check if user already reported this property
        $existingReport = \App\Models\Report::where('user_id', auth()->id())
            ->where('property_id', $property->id)
            ->first();

        if ($existingReport) {
            return back()->with('error', 'You have already reported this property.');
        }

        // Create the report
        \App\Models\Report::create([
            'user_id' => auth()->id(),
            'property_id' => $property->id,
            'reason' => $request->reason,
            'description' => $request->description,
            'status' => 'pending'
        ]);

        return back()->with('success', 'Property reported successfully. Our team will review it shortly.');
    }
}

