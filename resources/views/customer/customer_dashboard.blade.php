<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - BASHALAGBE?</title>
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
        <a href="#" class="text-2xl sm:text-3xl font-bold text-indigo-600 tracking-tight">BASHALAGBE?</a>

        <!-- Navigation Links -->
        <nav class="flex items-center space-x-4 sm:space-x-6">
            <!-- Logout Button -->
            <!-- The action is set to your logout route -->
            <form action="{{ route('customer.logout') }}" method="POST">
                @csrf
                <button type="submit" class="text-gray-600 hover:text-indigo-600 transition-colors duration-200 text-sm sm:text-base font-medium">Logout</button>
            </form>
        </nav>
    </header>

    <!-- Main Content Section -->
    <main class="flex-grow p-6">
        <div class="max-w-7xl mx-auto">
            <div class="bg-white p-6 rounded-xl shadow mb-6">
                <h1 class="text-2xl sm:text-3xl font-extrabold text-gray-900 mb-4">Welcome, {{ Auth::user()->name }}!</h1>
                <form method="GET" action="{{ route('customer.dashboard') }}" class="flex items-center space-x-3 mb-4">
                    <input type="text" name="q" value="{{ request('q') }}" placeholder="Search by city, location, area, description, utilities..." class="flex-1 border rounded-lg p-2" />
                    <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded">Search</button>
                    @if(!empty(request('q')))
                        <a href="{{ route('customer.dashboard') }}" class="text-gray-600 px-3 py-2">Clear</a>
                    @endif
                </form>

                <details class="group">
                    <summary class="cursor-pointer text-indigo-600">Advanced filters</summary>
                    <form method="GET" action="{{ route('customer.dashboard') }}" class="mt-4 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                        <input type="hidden" name="q" value="{{ request('q') }}" />

                        <div>
                            <label class="block text-sm text-gray-700">City</label>
                            <input type="text" name="city" value="{{ request('city') }}" class="mt-1 w-full border rounded p-2" />
                        </div>

                        <div>
                            <label class="block text-sm text-gray-700">Location</label>
                            <input type="text" name="location" value="{{ request('location') }}" class="mt-1 w-full border rounded p-2" />
                        </div>

                        <div>
                            <label class="block text-sm text-gray-700">Area</label>
                            <input type="text" name="area" value="{{ request('area') }}" class="mt-1 w-full border rounded p-2" />
                        </div>

                        <div>
                            <label class="block text-sm text-gray-700">Min Rent</label>
                            <input type="number" step="0.01" name="min_rent" value="{{ request('min_rent') }}" class="mt-1 w-full border rounded p-2" />
                        </div>

                        <div>
                            <label class="block text-sm text-gray-700">Max Rent</label>
                            <input type="number" step="0.01" name="max_rent" value="{{ request('max_rent') }}" class="mt-1 w-full border rounded p-2" />
                        </div>

                        <div>
                            <label class="block text-sm text-gray-700">Rooms (min)</label>
                            <input type="number" name="rooms_min" value="{{ request('rooms_min') }}" class="mt-1 w-full border rounded p-2" />
                        </div>

                        <div>
                            <label class="block text-sm text-gray-700">Rooms (max)</label>
                            <input type="number" name="rooms_max" value="{{ request('rooms_max') }}" class="mt-1 w-full border rounded p-2" />
                        </div>

                        <div>
                            <label class="block text-sm text-gray-700">Washrooms (min)</label>
                            <input type="number" name="washrooms_min" value="{{ request('washrooms_min') }}" class="mt-1 w-full border rounded p-2" />
                        </div>

                        <div>
                            <label class="block text-sm text-gray-700">Washrooms (max)</label>
                            <input type="number" name="washrooms_max" value="{{ request('washrooms_max') }}" class="mt-1 w-full border rounded p-2" />
                        </div>

                        <div>
                            <label class="block text-sm text-gray-700">Floor (min)</label>
                            <input type="number" name="floor_min" value="{{ request('floor_min') }}" class="mt-1 w-full border rounded p-2" />
                        </div>

                        <div>
                            <label class="block text-sm text-gray-700">Floor (max)</label>
                            <input type="number" name="floor_max" value="{{ request('floor_max') }}" class="mt-1 w-full border rounded p-2" />
                        </div>

                        <div>
                            <label class="block text-sm text-gray-700">Balcony (min)</label>
                            <input type="number" name="balcony_min" value="{{ request('balcony_min') }}" class="mt-1 w-full border rounded p-2" />
                        </div>

                        <div>
                            <label class="block text-sm text-gray-700">Balcony (max)</label>
                            <input type="number" name="balcony_max" value="{{ request('balcony_max') }}" class="mt-1 w-full border rounded p-2" />
                        </div>

                        <div>
                            <label class="block text-sm text-gray-700">Gas System</label>
                            <select name="gas_system" class="mt-1 w-full border rounded p-2 bg-white">
                                <option value="">Any</option>
                                <option value="Line" {{ request('gas_system')==='Line' ? 'selected' : '' }}>Line</option>
                                <option value="Cylinder" {{ request('gas_system')==='Cylinder' ? 'selected' : '' }}>Cylinder</option>
                            </select>
                        </div>

                        <div>
                            <label class="block text-sm text-gray-700">Electricity</label>
                            <select name="electricity" class="mt-1 w-full border rounded p-2 bg-white">
                                <option value="">Any</option>
                                <option value="Prepaid" {{ request('electricity')==='Prepaid' ? 'selected' : '' }}>Prepaid</option>
                                <option value="Postpaid" {{ request('electricity')==='Postpaid' ? 'selected' : '' }}>Postpaid</option>
                            </select>
                        </div>

                        <div>
                            <label class="block text-sm text-gray-700">Service Charge (min)</label>
                            <input type="number" step="0.01" name="service_charge_min" value="{{ request('service_charge_min') }}" class="mt-1 w-full border rounded p-2" />
                        </div>

                        <div>
                            <label class="block text-sm text-gray-700">Service Charge (max)</label>
                            <input type="number" step="0.01" name="service_charge_max" value="{{ request('service_charge_max') }}" class="mt-1 w-full border rounded p-2" />
                        </div>

                        <div class="sm:col-span-2 lg:col-span-3 flex items-center justify-between mt-2">
                            <label class="inline-flex items-center">
                                <input type="checkbox" name="has_image" value="1" {{ request('has_image') ? 'checked' : '' }} class="rounded">
                                <span class="ml-2 text-sm text-gray-700">Only show listings with images</span>
                            </label>
                            <div class="space-x-2">
                                <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded">Apply filters</button>
                                <a href="{{ route('customer.dashboard') }}" class="text-gray-600 px-3 py-2">Reset</a>
                            </div>
                        </div>
                    </form>
                </details>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse($properties as $property)
                    <div class="bg-white rounded-xl shadow border border-gray-200 overflow-hidden">
                        @if($property->image)
                            <img src="{{ asset('storage/'.$property->image) }}" alt="Property image" class="w-full h-40 object-cover">
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

                            <!-- Review Modal Trigger -->
                            <div class="mt-2">
                                <button type="button" class="bg-indigo-600 text-white px-3 py-2 rounded" onclick="document.getElementById('review-modal-{{ $property->id }}').showModal()">Leave a review</button>
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
                                            <label class="block text-sm text-gray-700">Your review (optional)</label>
                                            <textarea name="review_text" rows="4" class="mt-1 w-full border rounded p-2" placeholder="Share your experience..."></textarea>
                                        </div>
                                        <div class="flex items-center justify-end space-x-2 pt-2">
                                            <button type="button" class="text-gray-700 px-3 py-2" onclick="document.getElementById('review-modal-{{ $property->id }}').close()">Cancel</button>
                                            <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded">Submit</button>
                                        </div>
                                    </form>
                                </div>
                            </dialog>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full">
                        <div class="bg-white p-6 rounded-xl shadow text-center text-gray-600">No properties available yet.</div>
                    </div>
                @endforelse
            </div>
        </div>
    </main>

    <!-- Footer Section -->
    <footer class="bg-gray-200 p-4 text-center text-gray-600 text-sm">
        &copy; 2024 BASHALAGBE? All Rights Reserved.
    </footer>

</body>
</html>
