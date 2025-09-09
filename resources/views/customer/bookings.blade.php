<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Bookings - BASHALAGBE?</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen">
    <!-- Header -->
    <header class="bg-white shadow-md">
        <div class="container mx-auto px-4 py-4 flex justify-between items-center">
            <div class="flex items-center space-x-4">
                <h1 class="text-2xl font-bold text-blue-600">BASHALAGBE?</h1>
                <span class="text-gray-600">My Bookings</span>
            </div>
            <nav class="flex items-center space-x-6">
                <a href="{{ route('customer.dashboard') }}" class="text-gray-600 hover:text-blue-600 transition-colors">Dashboard</a>
                <a href="{{ route('customer.bookings') }}" class="text-blue-600 font-medium">My Bookings</a>
                <a href="{{ route('customer.favorites') }}" class="text-gray-600 hover:text-blue-600 transition-colors">Favorites</a>
                <form method="POST" action="{{ route('customer.logout') }}" class="inline">
                    @csrf
                    <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600 transition-colors">
                        Logout
                    </button>
                </form>
            </nav>
        </div>
    </header>

    <!-- Main Content -->
    <main class="container mx-auto px-4 py-8">
        <div class="bg-white rounded-xl shadow-lg p-6">
            <h2 class="text-2xl font-bold text-gray-800 mb-6">My Visit Requests</h2>
            
            @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
                    {{ session('success') }}
                </div>
            @endif

            @forelse($bookings as $booking)
                <div class="border rounded-lg p-6 mb-4 hover:shadow-md transition-shadow">
                    <div class="flex justify-between items-start">
                        <div class="flex-1">
                            <div class="flex items-center gap-4 mb-4">
                                <h3 class="text-xl font-semibold text-gray-800">Property in {{ $booking->property->location }}, {{ $booking->property->city }}</h3>
                                <span class="px-3 py-1 rounded-full text-sm font-medium
                                    @if($booking->status === 'pending') bg-yellow-100 text-yellow-800
                                    @elseif($booking->status === 'confirmed') bg-green-100 text-green-800
                                    @elseif($booking->status === 'rejected') bg-red-100 text-red-800
                                    @endif">
                                    {{ ucfirst($booking->status) }}
                                </span>
                            </div>
                            
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm text-gray-600">
                                <div>
                                    <span class="font-medium">Visit Date:</span>
                                    <div>{{ $booking->visit_date->format('M d, Y') }}</div>
                                </div>
                                <div>
                                    <span class="font-medium">Requested:</span>
                                    <div>{{ $booking->created_at->format('M d, Y') }}</div>
                                </div>
                            </div>
                            
                            @if($booking->message)
                                <div class="mt-4">
                                    <span class="font-medium text-gray-700">Message:</span>
                                    <p class="text-gray-600 mt-1">{{ $booking->message }}</p>
                                </div>
                            @endif
                            
                            <div class="mt-4 text-sm text-gray-500">
                                <span class="font-medium">Landlord:</span> {{ $booking->landlord->name }}
                                @if($booking->landlord->phone)
                                    | <span class="font-medium">Phone:</span> {{ $booking->landlord->phone }}
                                @endif
                            </div>
                        </div>
                        
                        @if($booking->property->image)
                            <div class="ml-6">
                                <img src="{{ asset('storage/' . $booking->property->image) }}" 
                                     alt="Property in {{ $booking->property->location }}, {{ $booking->property->city }}" 
                                     class="w-24 h-24 object-cover rounded-lg">
                            </div>
                        @endif
                    </div>
                </div>
            @empty
                <div class="text-center py-12">
                    <div class="text-gray-400 text-6xl mb-4">📅</div>
                    <h3 class="text-xl font-medium text-gray-600 mb-2">No Booking Requests Yet</h3>
                    <p class="text-gray-500 mb-6">You haven't made any booking requests yet.</p>
                    <a href="{{ route('customer.dashboard') }}" class="bg-blue-500 text-white px-6 py-3 rounded-lg hover:bg-blue-600 transition-colors">
                        Browse Properties
                    </a>
                </div>
            @endforelse
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-gray-200 p-4 text-center text-gray-600 text-sm mt-8">
        &copy; 2024 BASHALAGBE? All Rights Reserved.
    </footer>
</body>
</html>