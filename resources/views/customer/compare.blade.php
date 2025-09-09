<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Compare Properties - BASHALAGBE?</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: {
                            50: '#f0f9ff',
                            100: '#e0f2fe',
                            200: '#bae6fd',
                            300: '#7dd3fc',
                            400: '#38bdf8',
                            500: '#0ea5e9',
                            600: '#0284c7',
                            700: '#0369a1',
                            800: '#075985',
                            900: '#0c4a6e'
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
                        'sans': ['Inter', 'system-ui', 'sans-serif']
                    }
                }
            }
        }
    </script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap');
        
        .glass-effect {
            background: rgba(255, 255, 255, 0.25);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.18);
        }
        
        .floating-animation {
            animation: float 6s ease-in-out infinite;
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }
    </style>
</head>
<body class="min-h-screen bg-gradient-to-br from-primary-50 via-white to-accent-50 flex flex-col">

    <!-- Background Decorations -->
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <div class="absolute top-1/4 left-1/4 w-64 h-64 bg-gradient-to-r from-primary-200 to-accent-200 rounded-full mix-blend-multiply filter blur-xl opacity-70 floating-animation"></div>
        <div class="absolute top-3/4 right-1/4 w-64 h-64 bg-gradient-to-r from-accent-200 to-primary-200 rounded-full mix-blend-multiply filter blur-xl opacity-70 floating-animation" style="animation-delay: 2s;"></div>
    </div>

    <!-- Header Section -->
    <header class="relative glass-effect shadow-xl border-b border-white/20 p-4 sm:p-6">
        <div class="max-w-7xl mx-auto flex justify-between items-center">
            <!-- Logo -->
            <a href="{{ route('customer.dashboard') }}" class="flex items-center space-x-3">
                <div class="w-12 h-12 bg-gradient-to-r from-primary-500 to-accent-500 rounded-2xl flex items-center justify-center shadow-lg">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2 2z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V5a2 2 0 012-2h4a2 2 0 012 2v2"/>
                    </svg>
                </div>
                <span class="text-2xl sm:text-3xl font-bold bg-gradient-to-r from-primary-600 to-accent-600 bg-clip-text text-transparent tracking-tight">BASHALAGBE?</span>
            </a>

            <!-- Navigation Links -->
            <nav class="flex items-center space-x-4 sm:space-x-6">
                <a href="{{ route('customer.dashboard') }}" class="flex items-center space-x-2 text-gray-700 hover:text-primary-600 transition-all duration-200 text-sm sm:text-base font-medium px-4 py-2 rounded-xl hover:bg-white/50">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                    </svg>
                    <span>Dashboard</span>
                </a>
                <!-- Logout Button -->
                <form action="{{ route('customer.logout') }}" method="POST" class="inline">
                    @csrf
                    <button type="submit" class="flex items-center space-x-2 text-gray-700 hover:text-red-600 transition-all duration-200 text-sm sm:text-base font-medium px-4 py-2 rounded-xl hover:bg-white/50">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                        </svg>
                        <span>Logout</span>
                    </button>
                </form>
            </nav>
        </div>
    </header>

    <!-- Main Content Section -->
    <main class="relative flex-grow p-6">
        <div class="max-w-7xl mx-auto">
            <!-- Header Card -->
            <div class="glass-effect p-6 sm:p-8 rounded-3xl shadow-2xl border border-white/20 mb-8">
                <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
                    <div>
                        <h1 class="text-3xl sm:text-4xl font-bold text-gray-900 mb-2">
                            Compare Properties
                        </h1>
                        <p class="text-gray-600 text-lg">Analyzing {{ count($properties) }} properties side by side to help you make the best decision</p>
                    </div>
                    <div class="flex items-center space-x-4">
                        <div class="bg-primary-100 text-primary-700 px-4 py-2 rounded-xl font-semibold">
                            {{ count($properties) }} Properties
                        </div>
                        <form method="POST" action="{{ route('customer.compare.clear') }}" class="inline">
                            @csrf
                            <button type="submit" class="bg-gradient-to-r from-red-500 to-red-600 text-white px-6 py-3 rounded-2xl font-semibold shadow-lg hover:from-red-600 hover:to-red-700 transition-all duration-200 transform hover:-translate-y-0.5 hover:shadow-xl">
                                <span class="flex items-center space-x-2">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                    </svg>
                                    <span>Clear All</span>
                                </span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            @if($properties->count() > 0)
                <!-- Comparison Table -->
                <div class="glass-effect rounded-3xl shadow-2xl border border-white/20 overflow-hidden">
                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead class="bg-gradient-to-r from-primary-50 to-accent-50">
                                <tr>
                                    <th class="px-6 py-4 text-left text-sm font-bold text-gray-900 w-1/4">
                                        <div class="flex items-center space-x-2">
                                            <svg class="w-5 h-5 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                                            </svg>
                                            <span>Property Details</span>
                                        </div>
                                    </th>
                                    @foreach($properties as $property)
                                        <th class="px-6 py-4 text-left">
                                            <div class="bg-white rounded-2xl p-4 shadow-lg border border-gray-100">
                                                <div class="text-sm font-bold text-gray-900 mb-1">Property {{ $loop->iteration }}</div>
                                                <div class="text-xs text-gray-600">{{ $property->city }}</div>
                                            </div>
                                        </th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody class="bg-white/50 backdrop-blur-sm divide-y divide-gray-100">
                                <!-- Property Images -->
                                <tr class="hover:bg-white/70 transition-colors">
                                    <td class="px-6 py-6">
                                        <div class="flex items-center space-x-2">
                                            <svg class="w-5 h-5 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                            </svg>
                                            <span class="text-sm font-semibold text-gray-900">Property Image</span>
                                        </div>
                                    </td>
                                    @foreach($properties as $property)
                                        <td class="px-6 py-6">
                                            @if($property->image)
                                                <div class="relative group">
                                                    <img src="{{ asset('storage/app/public/'.$property->image) }}" alt="Property image" class="w-40 h-32 object-cover rounded-2xl shadow-lg group-hover:shadow-xl transition-shadow">
                                                    <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent rounded-2xl opacity-0 group-hover:opacity-100 transition-opacity"></div>
                                                </div>
                                            @else
                                                <div class="w-40 h-32 bg-gradient-to-br from-gray-100 to-gray-200 flex items-center justify-center text-gray-500 rounded-2xl shadow-lg">
                                                    <div class="text-center">
                                                        <svg class="w-8 h-8 mx-auto mb-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                                        </svg>
                                                        <span class="text-xs font-medium">No Image</span>
                                                    </div>
                                                </div>
                                            @endif
                                        </td>
                                    @endforeach
                                </tr>

                                <!-- Location -->
                                <tr class="bg-primary-25 hover:bg-white/70 transition-colors">
                                    <td class="px-6 py-6">
                                        <div class="flex items-center space-x-2">
                                            <svg class="w-5 h-5 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                            </svg>
                                            <span class="text-sm font-semibold text-gray-900">Location</span>
                                        </div>
                                    </td>
                                    @foreach($properties as $property)
                                        <td class="px-6 py-6">
                                            <div class="bg-white rounded-2xl p-4 shadow-lg border border-gray-100">
                                                <div class="text-sm font-bold text-gray-900">{{ $property->city }} - {{ $property->location }}</div>
                                                @if($property->area)
                                                    <div class="text-xs text-gray-600 mt-1 flex items-center">
                                                        <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                                                        </svg>
                                                        {{ $property->area }}
                                                    </div>
                                                @endif
                                            </div>
                                        </td>
                                    @endforeach
                                </tr>

                                <!-- Rent -->
                                <tr class="hover:bg-white/70 transition-colors">
                                    <td class="px-6 py-6">
                                        <div class="flex items-center space-x-2">
                                            <svg class="w-5 h-5 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                            </svg>
                                            <span class="text-sm font-semibold text-gray-900">Monthly Rent</span>
                                        </div>
                                    </td>
                                    @foreach($properties as $property)
                                        <td class="px-6 py-6">
                                            <div class="bg-gradient-to-r from-primary-50 to-accent-50 rounded-2xl p-4 shadow-lg border border-primary-100">
                                                <div class="text-lg font-bold text-primary-700">
                                                    ৳ {{ number_format($property->rent, 0) }}
                                                </div>
                                                <div class="text-xs text-gray-600 mt-1">per month</div>
                                            </div>
                                        </td>
                                    @endforeach
                                </tr>

                                <!-- Service Charge -->
                                <tr class="bg-accent-25 hover:bg-white/70 transition-colors">
                                    <td class="px-6 py-6">
                                        <div class="flex items-center space-x-2">
                                            <svg class="w-5 h-5 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                            </svg>
                                            <span class="text-sm font-semibold text-gray-900">Service Charge</span>
                                        </div>
                                    </td>
                                    @foreach($properties as $property)
                                        <td class="px-6 py-6">
                                            <div class="bg-white rounded-2xl p-4 shadow-lg border border-gray-100">
                                                @if(!is_null($property->service_charge))
                                                    <div class="text-sm font-bold text-gray-900">৳ {{ number_format($property->service_charge, 0) }}</div>
                                                    <div class="text-xs text-gray-600 mt-1">additional</div>
                                                @else
                                                    <div class="text-sm text-gray-500 italic">Not specified</div>
                                                @endif
                                            </div>
                                        </td>
                                    @endforeach
                                </tr>

                                <!-- Rooms -->
                                <tr class="hover:bg-white/70 transition-colors">
                                    <td class="px-6 py-6">
                                        <div class="flex items-center space-x-2">
                                            <svg class="w-5 h-5 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2 2z"/>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V5a2 2 0 012-2h4a2 2 0 012 2v2"/>
                                            </svg>
                                            <span class="text-sm font-semibold text-gray-900">Bedrooms</span>
                                        </div>
                                    </td>
                                    @foreach($properties as $property)
                                        <td class="px-6 py-6">
                                            <div class="bg-white rounded-2xl p-4 shadow-lg border border-gray-100 text-center">
                                                <div class="text-2xl font-bold text-primary-600">{{ $property->number_of_rooms ?? '?' }}</div>
                                                <div class="text-xs text-gray-600 mt-1">rooms</div>
                                            </div>
                                        </td>
                                    @endforeach
                                </tr>

                                <!-- Washrooms -->
                                <tr class="bg-primary-25 hover:bg-white/70 transition-colors">
                                    <td class="px-6 py-6">
                                        <div class="flex items-center space-x-2">
                                            <svg class="w-5 h-5 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 14v3m4-3v3m4-3v3M3 21h18M3 10h18M3 7l9-4 9 4M4 10v11M20 10v11"/>
                                            </svg>
                                            <span class="text-sm font-semibold text-gray-900">Bathrooms</span>
                                        </div>
                                    </td>
                                    @foreach($properties as $property)
                                        <td class="px-6 py-6">
                                            <div class="bg-white rounded-2xl p-4 shadow-lg border border-gray-100 text-center">
                                                <div class="text-2xl font-bold text-accent-600">{{ $property->number_of_washrooms ?? '?' }}</div>
                                                <div class="text-xs text-gray-600 mt-1">bathrooms</div>
                                            </div>
                                        </td>
                                    @endforeach
                                </tr>

                                <!-- Floor -->
                                <tr class="hover:bg-white/70 transition-colors">
                                    <td class="px-6 py-6">
                                        <div class="flex items-center space-x-2">
                                            <svg class="w-5 h-5 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                                            </svg>
                                            <span class="text-sm font-semibold text-gray-900">Floor Level</span>
                                        </div>
                                    </td>
                                    @foreach($properties as $property)
                                        <td class="px-6 py-6">
                                            <div class="bg-white rounded-2xl p-4 shadow-lg border border-gray-100 text-center">
                                                <div class="text-lg font-bold text-gray-900">{{ $property->floor_number ?? 'N/A' }}</div>
                                                <div class="text-xs text-gray-600 mt-1">floor</div>
                                            </div>
                                        </td>
                                    @endforeach
                                </tr>

                                <!-- Amenities Row -->
                                <tr class="bg-accent-25 hover:bg-white/70 transition-colors">
                                    <td class="px-6 py-6">
                                        <div class="flex items-center space-x-2">
                                            <svg class="w-5 h-5 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"/>
                                            </svg>
                                            <span class="text-sm font-semibold text-gray-900">Amenities</span>
                                        </div>
                                    </td>
                                    @foreach($properties as $property)
                                        <td class="px-6 py-6">
                                            <div class="bg-white rounded-2xl p-4 shadow-lg border border-gray-100">
                                                <div class="space-y-2">
                                                    <!-- Balcony -->
                                                    <div class="flex items-center space-x-2">
                                                        @if($property->balcony)
                                                            <div class="w-2 h-2 bg-green-500 rounded-full"></div>
                                                            <span class="text-xs text-green-700 font-medium">Balcony</span>
                                                        @else
                                                            <div class="w-2 h-2 bg-red-500 rounded-full"></div>
                                                            <span class="text-xs text-red-700 font-medium">No Balcony</span>
                                                        @endif
                                                    </div>
                                                    <!-- Gas -->
                                                    <div class="flex items-center space-x-2">
                                                        @if($property->gas_system)
                                                            <div class="w-2 h-2 bg-green-500 rounded-full"></div>
                                                            <span class="text-xs text-green-700 font-medium">Gas Available</span>
                                                        @else
                                                            <div class="w-2 h-2 bg-red-500 rounded-full"></div>
                                                            <span class="text-xs text-red-700 font-medium">No Gas</span>
                                                        @endif
                                                    </div>
                                                    <!-- Electricity -->
                                                    <div class="flex items-center space-x-2">
                                                        @if($property->electricity)
                                                            <div class="w-2 h-2 bg-green-500 rounded-full"></div>
                                                            <span class="text-xs text-green-700 font-medium">Electricity</span>
                                                        @else
                                                            <div class="w-2 h-2 bg-red-500 rounded-full"></div>
                                                            <span class="text-xs text-red-700 font-medium">No Electricity</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    @endforeach
                                </tr>

                                <!-- Posted Date -->
                                <tr class="hover:bg-white/70 transition-colors">
                                    <td class="px-6 py-6">
                                        <div class="flex items-center space-x-2">
                                            <svg class="w-5 h-5 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                            </svg>
                                            <span class="text-sm font-semibold text-gray-900">Posted Date</span>
                                        </div>
                                    </td>
                                    @foreach($properties as $property)
                                        <td class="px-6 py-6">
                                            <div class="bg-white rounded-2xl p-4 shadow-lg border border-gray-100 text-center">
                                                <div class="text-sm font-bold text-gray-900">{{ $property->created_at->format('d M Y') }}</div>
                                                <div class="text-xs text-gray-600 mt-1">{{ $property->created_at->diffForHumans() }}</div>
                                            </div>
                                        </td>
                                    @endforeach
                                </tr>

                                <!-- Description -->
                                <tr class="bg-primary-25 hover:bg-white/70 transition-colors">
                                    <td class="px-6 py-6">
                                        <div class="flex items-center space-x-2">
                                            <svg class="w-5 h-5 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7"/>
                                            </svg>
                                            <span class="text-sm font-semibold text-gray-900">Description</span>
                                        </div>
                                    </td>
                                    @foreach($properties as $property)
                                        <td class="px-6 py-6">
                                            <div class="bg-white rounded-2xl p-4 shadow-lg border border-gray-100">
                                                <div class="text-sm text-gray-700 leading-relaxed">
                                                    @if($property->description)
                                                        {{ Str::limit($property->description, 120) }}
                                                    @else
                                                        <span class="text-gray-500 italic">No description available</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </td>
                                    @endforeach
                                </tr>

                                <!-- Average Rating -->
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Average Rating</td>
                                    @foreach($properties as $property)
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                            @if($property->reviews->count() > 0)
                                                <span class="text-amber-600 font-medium">
                                                    {{ number_format($property->reviews->avg('rating'), 1) }}/5
                                                </span>
                                                <span class="text-gray-500 text-xs">
                                                    ({{ $property->reviews->count() }} reviews)
                                                </span>
                                            @else
                                                <span class="text-gray-500">No reviews</span>
                                            @endif
                                        </td>
                                    @endforeach
                                </tr>

                                <!-- Landlord Contact -->
                                <tr class="bg-gray-50">
                                    <td class="px-6 py-4 text-sm font-medium text-gray-900 align-top">Landlord Contact</td>
                                    @foreach($properties as $property)
                                        <td class="px-6 py-4 text-sm text-gray-900">
                                            @if($property->landlord)
                                                <div class="space-y-1">
                                                    <div><span class="font-medium">Name:</span> {{ $property->landlord->name }}</div>
                                                    <div><span class="font-medium">Email:</span> 
                                                        <a href="mailto:{{ $property->landlord->email }}" class="text-indigo-600 hover:underline">
                                                            {{ $property->landlord->email }}
                                                        </a>
                                                    </div>
                                                    @if($property->landlord->phone)
                                                        <div><span class="font-medium">Phone:</span> 
                                                            <a href="tel:{{ $property->landlord->phone }}" class="text-indigo-600 hover:underline">
                                                                {{ $property->landlord->phone }}
                                                            </a>
                                                        </div>
                                                    @endif
                                                </div>
                                            @else
                                                <span class="text-gray-500">Contact unavailable</span>
                                            @endif
                                        </td>
                                    @endforeach
                                </tr>

                                <!-- Actions -->
                                <tr class="hover:bg-white/70 transition-colors">
                                    <td class="px-6 py-6">
                                        <div class="flex items-center space-x-2">
                                            <svg class="w-5 h-5 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 100 4m0-4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 100 4m0-4v2m0-6V4"/>
                                            </svg>
                                            <span class="text-sm font-semibold text-gray-900">Actions</span>
                                        </div>
                                    </td>
                                    @foreach($properties as $property)
                                        <td class="px-6 py-6">
                                            <div class="bg-white rounded-2xl p-4 shadow-lg border border-gray-100">
                                                <div class="space-y-3">
                                                    <a href="{{ route('customer.property.details', $property->id) }}" class="block w-full bg-gradient-to-r from-primary-500 to-primary-600 text-white text-center py-2 px-3 rounded-xl font-semibold text-xs shadow-lg hover:from-primary-600 hover:to-primary-700 transition-all duration-200 transform hover:-translate-y-0.5">
                                                        <span class="flex items-center justify-center space-x-1">
                                                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                                            </svg>
                                                            <span>View Details</span>
                                                        </span>
                                                    </a>
                                                    <form method="POST" action="{{ route('properties.compare.remove', $property->id) }}" class="w-full">
                                                        @csrf
                                                        <button type="submit" class="w-full bg-gradient-to-r from-red-500 to-red-600 text-white py-2 px-3 rounded-xl font-semibold text-xs shadow-lg hover:from-red-600 hover:to-red-700 transition-all duration-200 transform hover:-translate-y-0.5">
                                                            <span class="flex items-center justify-center space-x-1">
                                                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                                                </svg>
                                                                <span>Remove</span>
                                                            </span>
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </td>
                                    @endforeach
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            @else
                <!-- Empty State -->
                <div class="glass-effect rounded-3xl shadow-2xl border border-white/20 p-12 text-center">
                    <div class="max-w-md mx-auto">
                        <div class="w-32 h-32 bg-gradient-to-br from-primary-100 to-accent-100 rounded-full flex items-center justify-center mx-auto mb-6 shadow-lg">
                            <svg class="w-16 h-16 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v4"/>
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 mb-3">No Properties to Compare</h3>
                        <p class="text-gray-600 mb-8 text-lg leading-relaxed">You haven't added any properties to compare yet. Browse our amazing properties and add them to your comparison list to make informed decisions.</p>
                        <a href="{{ route('customer.dashboard') }}" class="inline-flex items-center px-8 py-4 bg-gradient-to-r from-primary-500 to-accent-500 text-white font-bold rounded-2xl shadow-lg hover:from-primary-600 hover:to-accent-600 transition-all duration-200 transform hover:-translate-y-0.5 hover:shadow-xl">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                            </svg>
                            Browse Properties
                        </a>
                    </div>
                </div>
            @endif
        </div>
    </main>

    <!-- Footer Section -->
    <footer class="relative mt-16 glass-effect border-t border-white/20 p-6">
        <div class="max-w-7xl mx-auto">
            <div class="flex flex-col md:flex-row items-center justify-between">
                <div class="flex items-center space-x-3 mb-4 md:mb-0">
                    <div class="w-8 h-8 bg-gradient-to-r from-primary-500 to-accent-500 rounded-xl flex items-center justify-center">
                        <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2 2z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V5a2 2 0 012-2h4a2 2 0 012 2v2"/>
                        </svg>
                    </div>
                    <span class="text-lg font-bold bg-gradient-to-r from-primary-600 to-accent-600 bg-clip-text text-transparent">BASHALAGBE?</span>
                </div>
                <div class="text-center md:text-right">
                    <p class="text-gray-600 text-sm">&copy; 2024 BASHALAGBE? All rights reserved.</p>
                    <p class="text-gray-500 text-xs mt-1">Making property comparison easier and smarter</p>
                </div>
            </div>
        </div>
    </footer>

</body>
</html>