<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Favorites - BASHALAGBE?</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Apply the Inter font and a smooth background */
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap');
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f3f4f6;
        }
    </style>
</head>
<body class="min-h-screen flex flex-col">

    <!-- Header Section -->
    <header class="bg-white shadow-md p-4 flex justify-between items-center">
        <!-- Logo -->
        <a href="{{ route('customer.dashboard') }}" class="text-2xl sm:text-3xl font-bold text-indigo-600 tracking-tight">BASHALAGBE?</a>

        <!-- Navigation Links -->
        <nav class="flex items-center space-x-4 sm:space-x-6">
            <!-- Dashboard Link -->
            <a href="{{ route('customer.dashboard') }}" class="text-gray-600 hover:text-indigo-600 transition-colors duration-200 text-sm sm:text-base font-medium">Dashboard</a>
            
            <!-- Logout Button -->
            <form action="{{ route('customer.logout') }}" method="POST">
                @csrf
                <button type="submit" class="text-gray-600 hover:text-indigo-600 transition-colors duration-200 text-sm sm:text-base font-medium">Logout</button>
            </form>
        </nav>
    </header>

    <!-- Main Content Section -->
    <main class="flex-grow p-6">
        <div class="max-w-7xl mx-auto">
            <!-- Flash Messages -->
            @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif
            @if(session('error'))
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                    {{ session('error') }}
                </div>
            @endif
            @if(session('info'))
                <div class="bg-blue-100 border border-blue-400 text-blue-700 px-4 py-3 rounded mb-4">
                    {{ session('info') }}
                </div>
            @endif

            <!-- Page Header -->
            <div class="mb-6">
                <h1 class="text-3xl font-bold text-gray-900 mb-2">My Favorite Properties</h1>
                <p class="text-gray-600">Properties you've saved for later viewing</p>
            </div>

            <!-- Favorites Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse($favorites as $property)
                    <div class="bg-white rounded-xl shadow border border-gray-200 overflow-hidden">
                        @if($property->image)
                            <img src="{{ asset('storage/app/public/'.$property->image) }}" alt="Property image" class="w-full h-40 object-cover">
                        @else
                            <div class="w-full h-40 bg-gray-200 flex items-center justify-center text-gray-500">No image</div>
                        @endif
                        <div class="p-4 text-left">
                            <h3 class="text-lg font-semibold text-gray-900">{{ $property->city }} - {{ $property->location }}</h3>
                            <p class="text-sm text-gray-600">Posted on: {{ $property->created_at->format('d-m-Y') }}</p>
                            @if($property->area)
                                <p class="text-sm text-gray-600">Area: {{ $property->area }}</p>
                            @endif
                            <p class="mt-2 text-indigo-700 font-bold">৳ {{ number_format($property->rent, 2) }}</p>
                            <p class="text-sm text-gray-600 mt-1">
                                Rooms: {{ $property->number_of_rooms }} | Washrooms: {{ $property->number_of_washrooms }} | Floor: {{ $property->floor_number }}
                            </p>
                            <p class="text-sm text-gray-600 mt-1">
                                Balcony: {{ $property->balcony }} | Gas: {{ $property->gas_system }} | Electricity: {{ $property->electricity }}
                            </p>
                            @if(!is_null($property->service_charge))
                                <p class="text-sm text-gray-600 mt-1">Service charge: ৳ {{ number_format($property->service_charge, 2) }}</p>
                            @endif
                            @if($property->description)
                                <p class="text-sm text-gray-700 mt-2">{{ \Illuminate\Support\Str::limit($property->description, 120) }}</p>
                            @endif

                            <div class="mt-3">
                                <details>
                                    <summary class="text-indigo-600 hover:underline cursor-pointer">Contact the landlord</summary>
                                    <div class="mt-2 text-sm text-gray-700">
                                        @if($property->landlord)
                                            <p><span class="font-semibold">Name:</span> {{ $property->landlord->name }}</p>
                                            <p class="mt-1"><span class="font-semibold">Email:</span> <a href="mailto:{{ $property->landlord->email }}" class="text-indigo-600 hover:underline">{{ $property->landlord->email }}</a></p>
                                            @if($property->landlord->phone)
                                                <p class="mt-1"><span class="font-semibold">Phone:</span> <a href="tel:{{ $property->landlord->phone }}" class="text-indigo-600 hover:underline">{{ $property->landlord->phone }}</a></p>
                                            @endif
                                        @else
                                            <p>Landlord details unavailable.</p>
                                        @endif
                                    </div>
                                </details>
                            </div>

                            <!-- Reviews List -->
                            <div class="mt-4 border-t pt-3">
                                <h4 class="font-semibold text-gray-900 mb-2">Reviews</h4>
                                @forelse($property->reviews as $review)
                                    <div class="mb-3 p-3 rounded border border-gray-200 bg-gray-50">
                                        <div class="flex items-center justify-between">
                                            <div class="text-sm text-gray-700">
                                                <span class="font-semibold">{{ $review->user->name ?? 'User' }}</span>
                                                <span class="ml-2 text-amber-600">Rating: {{ $review->rating }}/5</span>
                                            </div>
                                            <span class="text-xs text-gray-500">{{ $review->created_at->format('d M Y') }}</span>
                                        </div>
                                        @if($review->review_text)
                                            <p class="mt-1 text-sm text-gray-700">{{ $review->review_text }}</p>
                                        @endif
                                    </div>
                                @empty
                                    <p class="text-sm text-gray-500">No reviews yet.</p>
                                @endforelse
                            </div>

                            <!-- Action Buttons -->
                            <div class="mt-4 flex items-center justify-between">
                                <button type="button" class="bg-indigo-600 text-white px-3 py-2 rounded" onclick="document.getElementById('review-modal-{{ $property->id }}').showModal()">Leave a review</button>
                                
                                <!-- Remove from Favorites -->
                                <form method="POST" action="{{ route('properties.favorites.remove', $property) }}" class="inline">
                                    @csrf
                                    <button type="submit" class="text-red-500 hover:text-red-600 transition-colors p-1" title="Remove from favorites">
                                        <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24">
                                            <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/>
                                        </svg>
                                    </button>
                                </form>
                            </div>

                            <!-- Review Modal -->
                            <dialog id="review-modal-{{ $property->id }}" class="rounded-xl p-0 w-11/12 max-w-lg">
                                <form method="dialog">
                                    <button class="absolute right-3 top-3 text-gray-400 hover:text-gray-600">✕</button>
                                </form>
                                <div class="p-6">
                                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Leave a review</h3>
                                    <form method="POST" action="{{ route('properties.reviews.store', $property) }}" class="space-y-3">
                                        @csrf
                                        <div>
                                            <label class="block text-sm text-gray-700">Rating (1-5)</label>
                                            <select name="rating" required class="mt-1 w-full border rounded p-2 bg-white">
                                                <option value="">Select rating</option>
                                                @for($i=1; $i<=5; $i++)
                                                    <option value="{{ $i }}">{{ $i }}</option>
                                                @endfor
                                            </select>
                                        </div>
                                        <div>
                                            <label class="block text-sm text-gray-700">Review (optional)</label>
                                            <textarea name="review_text" rows="3" class="mt-1 w-full border rounded p-2" placeholder="Share your experience..."></textarea>
                                        </div>
                                        <div class="flex justify-end space-x-2">
                                            <button type="button" onclick="this.closest('dialog').close()" class="px-4 py-2 text-gray-600 border rounded">Cancel</button>
                                            <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded">Submit Review</button>
                                        </div>
                                    </form>
                                </div>
                            </dialog>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full text-center py-12">
                        <svg class="w-16 h-16 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                        </svg>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">No favorites yet</h3>
                        <p class="text-gray-600 mb-4">Start adding properties to your favorites by clicking the heart icon on any listing.</p>
                        <a href="{{ route('customer.dashboard') }}" class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700 transition-colors">
                            Browse Properties
                        </a>
                    </div>
                @endforelse
            </div>
        </div>
    </main>

    <!-- Footer Section -->
    <footer class="bg-white border-t border-gray-200 p-4 text-center text-gray-600">
        <p>&copy; 2024 BASHALAGBE? All rights reserved.</p>
    </footer>

</body>
</html>