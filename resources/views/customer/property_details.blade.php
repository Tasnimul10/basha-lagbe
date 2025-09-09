<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $property->location }}, {{ $property->city }} - BASHALAGBE?</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: {
                            50: '#eff6ff',
                            100: '#dbeafe',
                            200: '#bfdbfe',
                            300: '#93c5fd',
                            400: '#60a5fa',
                            500: '#3b82f6',
                            600: '#2563eb',
                            700: '#1d4ed8',
                            800: '#1e40af',
                            900: '#1e3a8a'
                        },
                        accent: {
                            50: '#fdf4ff',
                            100: '#fae8ff',
                            200: '#f5d0fe',
                            300: '#f0abfc',
                            400: '#e879f9',
                            500: '#d946ef',
                            600: '#c026d3',
                            700: '#a21caf',
                            800: '#86198f',
                            900: '#701a75'
                        }
                    },
                    fontFamily: {
                        sans: ['Inter', 'system-ui', 'sans-serif']
                    }
                }
            }
        }
    </script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap');
        
        .glass-effect {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        
        .gradient-bg {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
    </style>
</head>
<body class="min-h-screen bg-gradient-to-br from-slate-50 via-blue-50 to-indigo-50">

    <!-- Header Section -->
    <header class="glass-effect sticky top-0 z-50 border-b border-white/20">
        <div class="max-w-7xl mx-auto px-6 py-4">
            <div class="flex justify-between items-center">
                <!-- Logo -->
                <a href="{{ route('customer.dashboard') }}" class="text-3xl font-bold bg-gradient-to-r from-primary-600 to-accent-600 bg-clip-text text-transparent">
                    BASHALAGBE?
                </a>
                
                <!-- Navigation -->
                <nav class="flex items-center space-x-6">
                    <a href="{{ route('customer.dashboard') }}" class="text-slate-700 hover:text-primary-600 transition-colors font-medium">
                        Dashboard
                    </a>
                    <a href="{{ route('customer.messages') }}" class="text-slate-700 hover:text-primary-600 transition-colors font-medium">
                        Messages
                    </a>
                    <form action="{{ route('customer.logout') }}" method="POST" class="inline">
                        @csrf
                        <button type="submit" class="text-slate-700 hover:text-primary-600 transition-colors font-medium">
                            Logout
                        </button>
                    </form>
                </nav>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="max-w-7xl mx-auto px-6 py-8">
        <!-- Back Button -->
        <div class="mb-6">
            <a href="{{ route('customer.dashboard') }}" class="inline-flex items-center space-x-2 text-primary-600 hover:text-primary-700 font-medium transition-colors">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                </svg>
                <span>Back to Properties</span>
            </a>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Property Details -->
            <div class="lg:col-span-2 space-y-6">
                <!-- Property Image -->
                <div class="glass-effect rounded-3xl overflow-hidden">
                    @if($property->image)
                        <img src="{{ asset('storage/' . $property->image) }}" 
                             alt="Property in {{ $property->location }}, {{ $property->city }}" 
                             class="w-full h-96 object-cover">
                    @else
                        <div class="w-full h-96 bg-gradient-to-br from-slate-200 to-slate-300 flex items-center justify-center">
                            <svg class="w-24 h-24 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                        </div>
                    @endif
                </div>

                <!-- Property Information -->
                <div class="glass-effect rounded-3xl p-8">
                    <h1 class="text-3xl font-bold text-slate-900 mb-4">Property in {{ $property->location }}</h1>
                    
                    <div class="flex items-center space-x-2 text-slate-600 mb-6">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                        <span>{{ $property->location }}, {{ $property->city }}</span>
                    </div>

                    <div class="grid grid-cols-2 md:grid-cols-4 gap-6 mb-8">
                        <div class="text-center p-4 bg-slate-50 rounded-xl">
                            <div class="text-2xl font-bold text-primary-600">{{ $property->	number_of_rooms }}</div>
                            <div class="text-sm text-slate-600">Rooms</div>
                        </div>
                        <div class="text-center p-4 bg-slate-50 rounded-xl">
                            <div class="text-2xl font-bold text-primary-600">{{ $property->number_of_washrooms }}</div>
                            <div class="text-sm text-slate-600">Washrooms</div>
                        </div>
                        <div class="text-center p-4 bg-slate-50 rounded-xl">
                            <div class="text-2xl font-bold text-primary-600">{{ $property->floor_number }}</div>
                            <div class="text-sm text-slate-600">Floor</div>
                        </div>
                        <div class="text-center p-4 bg-slate-50 rounded-xl">
                            <div class="text-2xl font-bold text-primary-600">{{ $property->balcony }}</div>
                            <div class="text-sm text-slate-600">Balcony</div>
                        </div>
                    </div>

                    <div class="space-y-4">
                        <h3 class="text-xl font-bold text-slate-900">Description</h3>
                        <p class="text-slate-700 leading-relaxed">{{ $property->description }}</p>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-8">
                        <div class="space-y-2">
                            <h4 class="font-semibold text-slate-900">Utilities</h4>
                            <div class="space-y-1 text-sm text-slate-600">
                                <div>Gas: {{ $property->gas_system }}</div>
                                <div>Electricity: {{ $property->electricity }}</div>
                            </div>
                        </div>
                        @if($property->service_charge)
                        <div class="space-y-2">
                            <h4 class="font-semibold text-slate-900">Additional Costs</h4>
                            <div class="text-sm text-slate-600">
                                Service Charge: ৳{{ number_format($property->service_charge, 2) }}
                            </div>
                        </div>
                        @endif
                    </div>
                </div>

                <!-- Reviews Section -->
                @if($property->reviews->count() > 0)
                <div class="glass-effect rounded-3xl p-8">
                    <h3 class="text-xl font-bold text-slate-900 mb-6">Reviews</h3>
                    <div class="space-y-4">
                        @foreach($property->reviews as $review)
                        <div class="border-b border-slate-200 pb-4 last:border-b-0">
                            <div class="flex items-center space-x-2 mb-2">
                                <span class="font-medium text-slate-900">{{ $review->user->name }}</span>
                                <div class="flex items-center">
                                    @for($i = 1; $i <= 5; $i++)
                                        <svg class="w-4 h-4 {{ $i <= $review->rating ? 'text-yellow-400' : 'text-slate-300' }}" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                        </svg>
                                    @endfor
                                </div>
                            </div>
                            @if($review->review_text)
                            <p class="text-slate-700">{{ $review->review_text }}</p>
                            @endif
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif
            </div>

            <!-- Sidebar -->
            <div class="space-y-6">
                <!-- Price Card -->
                <div class="glass-effect rounded-3xl p-6">
                    <div class="text-center">
                        <div class="text-3xl font-bold text-primary-600 mb-2">
                            ৳{{ number_format($property->rent, 2) }}
                        </div>
                        <div class="text-slate-600">per month</div>
                    </div>
                </div>

                <!-- Landlord Info -->
                @if($property->landlord)
                <div class="glass-effect rounded-3xl p-6">
                    <h3 class="text-lg font-bold text-slate-900 mb-4">Landlord Information</h3>
                    <div class="space-y-3">
                        <div>
                            <span class="text-sm font-medium text-slate-600">Name:</span>
                            <div class="text-slate-900">{{ $property->landlord->name }}</div>
                        </div>
                        <div>
                            <span class="text-sm font-medium text-slate-600">Email:</span>
                            <div class="text-slate-900">
                                <a href="mailto:{{ $property->landlord->email }}" class="text-primary-600 hover:text-primary-700">
                                    {{ $property->landlord->email }}
                                </a>
                            </div>
                        </div>
                        @if($property->landlord->phone)
                        <div>
                            <span class="text-sm font-medium text-slate-600">Phone:</span>
                            <div class="text-slate-900">
                                <a href="tel:{{ $property->landlord->phone }}" class="text-primary-600 hover:text-primary-700">
                                    {{ $property->landlord->phone }}
                                </a>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
                @endif

                <!-- Action Buttons -->
                <div class="space-y-3">
                    <!-- Favorite Button -->
                    @if(in_array($property->id, $favoriteIds))
                        <form method="POST" action="{{ route('properties.favorites.remove', $property) }}" class="w-full">
                            @csrf
                            <button type="submit" class="w-full bg-red-500 text-white py-3 px-4 rounded-xl font-semibold hover:bg-red-600 transition-colors flex items-center justify-center space-x-2">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd"/>
                                </svg>
                                <span>Remove from Favorites</span>
                            </button>
                        </form>
                    @else
                        <form method="POST" action="{{ route('properties.favorites.add', $property) }}" class="w-full">
                            @csrf
                            <button type="submit" class="w-full bg-gradient-to-r from-pink-500 to-red-500 text-white py-3 px-4 rounded-xl font-semibold hover:from-pink-600 hover:to-red-600 transition-all flex items-center justify-center space-x-2">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                                </svg>
                                <span>Add to Favorites</span>
                            </button>
                        </form>
                    @endif

                    <!-- Book Visit Button -->
                    <button onclick="openBookingModal({{ $property->id }})" class="w-full bg-gradient-to-r from-primary-600 to-accent-600 text-white py-3 px-4 rounded-xl font-semibold hover:from-primary-700 hover:to-accent-700 transition-all flex items-center justify-center space-x-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3a1 1 0 011-1h6a1 1 0 011 1v4m-6 0h6m-6 0V7a1 1 0 00-1 1v9a1 1 0 001 1h8a1 1 0 001-1V8a1 1 0 00-1-1h-1"/>
                        </svg>
                        <span>Book a Visit</span>
                    </button>

                    <!-- Message Landlord Button -->
                    <a href="{{ route('properties.messages.view', $property) }}" class="w-full bg-gradient-to-r from-green-500 to-emerald-500 text-white py-3 px-4 rounded-xl font-semibold hover:from-green-600 hover:to-emerald-600 transition-all flex items-center justify-center space-x-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                        </svg>
                        <span>Message Landlord</span>
                    </a>

                    <!-- Report Property Button -->
                    @auth
                    <button onclick="openReportModal({{ $property->id }})" class="w-full bg-gradient-to-r from-red-500 to-pink-500 text-white py-3 px-4 rounded-xl font-semibold hover:from-red-600 hover:to-pink-600 transition-all flex items-center justify-center space-x-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.732 16.5c-.77.833.192 2.5 1.732 2.5z"/>
                        </svg>
                        <span>Report Property</span>
                    </button>
                    @endauth
                </div>
            </div>
        </div>
    </main>

    <!-- Booking Modal -->
    <dialog id="booking-modal-{{ $property->id }}" class="modal backdrop:bg-black/50 backdrop:backdrop-blur-sm">
        <div class="modal-box glass-effect max-w-md mx-auto rounded-3xl border border-white/20">
            <div class="flex items-center justify-between mb-6">
                <h3 class="text-xl font-bold bg-gradient-to-r from-primary-600 to-accent-600 bg-clip-text text-transparent">Request Property Visit</h3>
                <button onclick="closeBookingModal({{ $property->id }})" class="p-2 text-gray-400 hover:text-gray-600 hover:bg-gray-100 rounded-xl transition-all duration-300">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
            
            <form method="POST" action="{{ route('properties.book', $property) }}" class="space-y-6">
                @csrf
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Visit Date</label>
                    <input type="date" name="visit_date" required min="{{ date('Y-m-d', strtotime('+1 day')) }}"
                           class="w-full px-4 py-3 border border-slate-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent transition-all">
                </div>
                
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Message (Optional)</label>
                    <textarea name="message" rows="3" placeholder="Any specific requirements or questions..."
                              class="w-full px-4 py-3 border border-slate-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent transition-all resize-none"></textarea>
                </div>
                
                <div class="flex space-x-3">
                    <button type="button" onclick="closeBookingModal({{ $property->id }})" 
                            class="flex-1 px-6 py-3 border border-slate-200 rounded-xl text-slate-700 hover:bg-slate-50 transition-colors font-medium">
                        Cancel
                    </button>
                    <button type="submit" 
                            class="flex-1 px-6 py-3 bg-gradient-to-r from-primary-600 to-accent-600 text-white rounded-xl hover:from-primary-700 hover:to-accent-700 transition-all font-semibold">
                        Send Request
                    </button>
                </div>
            </form>
        </div>
    </dialog>

    <!-- Report Modal -->
    @auth
    <dialog id="report-modal-{{ $property->id }}" class="modal backdrop:bg-black/50 backdrop:backdrop-blur-sm">
        <div class="modal-box glass-effect max-w-md mx-auto rounded-3xl border border-white/20">
            <div class="flex items-center justify-between mb-6">
                <h3 class="text-xl font-bold bg-gradient-to-r from-red-600 to-pink-600 bg-clip-text text-transparent">Report Property</h3>
                <button onclick="closeReportModal({{ $property->id }})" class="p-2 text-gray-400 hover:text-gray-600 hover:bg-gray-100 rounded-xl transition-all duration-300">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
            
            <form method="POST" action="{{ route('properties.report', $property) }}" class="space-y-6">
                @csrf
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Reason for Report</label>
                    <select name="reason" required class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent transition-all">
                        <option value="">Select a reason</option>
                        <option value="inappropriate_content">Inappropriate Content</option>
                        <option value="false_information">False Information</option>
                        <option value="spam">Spam</option>
                        <option value="fraud">Fraud/Scam</option>
                        <option value="duplicate">Duplicate Listing</option>
                        <option value="other">Other</option>
                    </select>
                </div>
                
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Additional Details (Optional)</label>
                    <textarea name="description" rows="4" placeholder="Please provide more details about your report..." class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent transition-all resize-none"></textarea>
                </div>
                
                <div class="flex space-x-3">
                    <button type="button" onclick="closeReportModal({{ $property->id }})" class="flex-1 px-6 py-3 border border-gray-200 text-gray-700 rounded-xl font-semibold hover:bg-gray-50 transition-all">
                        Cancel
                    </button>
                    <button type="submit" class="flex-1 bg-gradient-to-r from-red-500 to-pink-500 text-white px-6 py-3 rounded-xl font-semibold hover:from-red-600 hover:to-pink-600 transition-all">
                        Submit Report
                    </button>
                </div>
            </form>
        </div>
    </dialog>
    @endauth

    <footer class="glass-effect border-t border-white/20 mt-16">
        <div class="max-w-7xl mx-auto px-6 py-8">
            <div class="flex items-center justify-center space-x-3 mb-4">
                <div class="w-8 h-8 bg-gradient-to-r from-primary-600 to-accent-600 rounded-xl flex items-center justify-center">
                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                    </svg>
                </div>
                <span class="text-2xl font-bold bg-gradient-to-r from-primary-600 to-accent-600 bg-clip-text text-transparent">BASHALAGBE?</span>
            </div>
            <p class="text-center text-slate-600">&copy; 2024 BASHALAGBE? All Rights Reserved. Made with ❤️ for better living.</p>
        </div>
    </footer>

    <script>
        function openBookingModal(propertyId) {
            document.getElementById('booking-modal-' + propertyId).showModal();
        }
        
        function closeBookingModal(propertyId) {
            document.getElementById('booking-modal-' + propertyId).close();
        }
        
        function openReportModal(propertyId) {
            document.getElementById('report-modal-' + propertyId).showModal();
        }
        
        function closeReportModal(propertyId) {
            document.getElementById('report-modal-' + propertyId).close();
        }
    </script>

</body>
</html>