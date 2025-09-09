<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - BASHALAGBE?</title>
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
        
        .property-card {
            transition: all 0.3s ease;
        }
        
        .property-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
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

                <!-- Navigation Links -->
                <nav class="hidden md:flex items-center space-x-8">
                    <a href="{{ route('customer.dashboard') }}" class="flex items-center space-x-2 text-slate-700 hover:text-primary-600 transition-colors font-medium">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5a2 2 0 012-2h4a2 2 0 012 2v2H8V5z"/>
                        </svg>
                        <span>Dashboard</span>
                    </a>
                    
                    <a href="{{ route('customer.favorites') }}" class="flex items-center space-x-2 text-slate-700 hover:text-primary-600 transition-colors font-medium">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                        </svg>
                        <span>Favorites</span>
                    </a>
                    
                    <a href="{{ route('customer.bookings') }}" class="flex items-center space-x-2 text-slate-700 hover:text-primary-600 transition-colors font-medium">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3a1 1 0 011-1h6a1 1 0 011 1v4m-6 0h6m-6 0V7a1 1 0 00-1 1v9a1 1 0 001 1h8a1 1 0 001-1V8a1 1 0 00-1-1h-1"/>
                        </svg>
                        <span>Visit Requests</span>
                    </a>
                    
                    <a href="{{ route('customer.messages') }}" class="flex items-center space-x-2 text-slate-700 hover:text-primary-600 transition-colors font-medium">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                        </svg>
                        <span>Messages</span>
                    </a>
                </nav>
                
                <!-- User Menu -->
                <div class="flex items-center space-x-4">
                    <div class="hidden md:flex items-center space-x-3">
                        <div class="w-8 h-8 bg-gradient-to-r from-primary-500 to-accent-500 rounded-full flex items-center justify-center">
                            <span class="text-white font-semibold text-sm">{{ substr(Auth::user()->name, 0, 1) }}</span>
                        </div>
                        <span class="text-slate-700 font-medium">{{ Auth::user()->name }}</span>
                    </div>
                    
                    <form action="{{ route('customer.logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="bg-slate-100 hover:bg-slate-200 text-slate-700 px-4 py-2 rounded-xl transition-colors font-medium">
                            Logout
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content Section -->
    <main class="flex-1 py-8">
        <div class="max-w-7xl mx-auto px-6">
            <!-- Flash Messages -->
            @if(session('success'))
                <div class="bg-gradient-to-r from-green-50 to-emerald-50 border border-green-200 text-green-800 px-6 py-4 rounded-2xl mb-6 flex items-center">
                    <svg class="w-6 h-6 mr-3 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    {{ session('success') }}
                </div>
            @endif
            @if(session('error'))
                <div class="bg-gradient-to-r from-red-50 to-rose-50 border border-red-200 text-red-800 px-6 py-4 rounded-2xl mb-6 flex items-center">
                    <svg class="w-6 h-6 mr-3 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    {{ session('error') }}
                </div>
            @endif
            @if(session('info'))
                <div class="bg-gradient-to-r from-blue-50 to-indigo-50 border border-blue-200 text-blue-800 px-6 py-4 rounded-2xl mb-6 flex items-center">
                    <svg class="w-6 h-6 mr-3 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    {{ session('info') }}
                </div>
            @endif
            
            <!-- Comparison Bar -->
            @if(!empty($compareList) && count($compareList) > 0)
                <div class="bg-gradient-to-r from-primary-50 to-accent-50 border border-primary-200 rounded-2xl p-6 mb-8">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-3">
                            <div class="w-10 h-10 bg-primary-100 rounded-xl flex items-center justify-center">
                                <svg class="w-5 h-5 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-primary-800 font-semibold">{{ count($compareList) }} Properties Selected</h3>
                                <p class="text-primary-600 text-sm">Ready for comparison</p>
                            </div>
                        </div>
                        <div class="flex items-center space-x-3">
                            <a href="{{ route('customer.compare') }}" class="bg-primary-600 hover:bg-primary-700 text-white px-6 py-3 rounded-xl transition-colors font-medium flex items-center space-x-2">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                                </svg>
                                <span>Compare Now</span>
                            </a>
                            <form method="POST" action="{{ route('customer.compare.clear') }}" class="inline">
                                @csrf
                                <button type="submit" class="text-primary-600 hover:text-primary-800 px-4 py-3 rounded-xl hover:bg-primary-100 transition-colors font-medium">
                                    Clear All
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endif
            <!-- Search Form -->
            <div class="glass-effect rounded-3xl p-8 mb-8">
                <div class="flex items-center justify-between mb-6">
                    <div>
                        <h1 class="text-3xl font-bold bg-gradient-to-r from-primary-600 to-accent-600 bg-clip-text text-transparent">Welcome, {{ Auth::user()->name }}!</h1>
                        <p class="text-slate-600 mt-2">Find your perfect home from thousands of properties</p>
                    </div>
                    <div class="flex items-center space-x-2">
                        <span class="text-sm text-slate-500">{{ $properties->count() }} properties found</span>
                    </div>
                </div>
                
                <form method="GET" action="{{ route('customer.dashboard') }}" class="space-y-6">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div class="space-y-2">
                            <label for="q" class="block text-sm font-semibold text-slate-700">Search</label>
                            <div class="relative">
                                <svg class="absolute left-3 top-1/2 transform -translate-y-1/2 w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                                </svg>
                                <input type="text" id="q" name="q" value="{{ request('q') }}" 
                                       placeholder="Search by city, location, area, description..." 
                                       class="w-full pl-10 pr-4 py-3 border border-slate-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent transition-all">
                            </div>
                        </div>
                        <div class="space-y-2">
                            <label for="city" class="block text-sm font-semibold text-slate-700">City</label>
                            <div class="relative">
                                <svg class="absolute left-3 top-1/2 transform -translate-y-1/2 w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                                </svg>
                                <input type="text" id="city" name="city" value="{{ request('city') }}" 
                                       placeholder="Enter city" 
                                       class="w-full pl-10 pr-4 py-3 border border-slate-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent transition-all">
                            </div>
                        </div>
                        <div class="space-y-2">
                            <label for="max_rent" class="block text-sm font-semibold text-slate-700">Max Rent</label>
                            <div class="relative">
                                <svg class="absolute left-3 top-1/2 transform -translate-y-1/2 w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"/>
                                </svg>
                                <input type="number" id="max_rent" name="max_rent" value="{{ request('max_rent') }}" 
                                       placeholder="Enter max rent" 
                                       class="w-full pl-10 pr-4 py-3 border border-slate-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent transition-all">
                            </div>
                        </div>
                    </div>
                    
                    <div class="flex justify-between items-center pt-4">
                        <button type="button" id="toggleAdvanced" class="text-primary-600 hover:text-primary-700 font-semibold flex items-center space-x-2 transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 100 4m0-4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 100 4m0-4v2m0-6V4"/>
                            </svg>
                            <span>Advanced Filters</span>
                        </button>
                        <div class="flex space-x-3">
                            @if(!empty(request('q')) || !empty(request('city')) || !empty(request('max_rent')))
                                <a href="{{ route('customer.dashboard') }}" class="px-6 py-3 border border-slate-200 rounded-xl text-slate-700 hover:bg-slate-50 transition-colors font-medium">
                                    Clear
                                </a>
                            @endif
                            <button type="submit" class="px-8 py-3 bg-gradient-to-r from-primary-600 to-accent-600 text-white rounded-xl hover:from-primary-700 hover:to-accent-700 transition-all font-semibold flex items-center space-x-2">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                                </svg>
                                <span>Search Properties</span>
                            </button>
                        </div>
                    </div>
                </form>
            </div>

            <!-- Advanced Filters -->
            <div id="advancedFilters" class="glass-effect rounded-3xl p-8 mb-8 hidden">
                <form method="GET" action="{{ route('customer.dashboard') }}" class="space-y-6">
                    <!-- Include existing search parameters -->
                    <input type="hidden" name="q" value="{{ request('q') }}">
                    <input type="hidden" name="city" value="{{ request('city') }}">
                    <input type="hidden" name="max_rent" value="{{ request('max_rent') }}">
                    
                    <div class="flex items-center justify-between mb-6">
                        <div>
                            <h3 class="text-xl font-bold text-slate-900">Advanced Filters</h3>
                            <p class="text-slate-600 mt-1">Refine your search with detailed criteria</p>
                        </div>
                    </div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        <div class="space-y-2">
                            <label class="block text-sm font-semibold text-slate-700">Location</label>
                            <input type="text" name="location" value="{{ request('location') }}" 
                                   placeholder="Enter location"
                                   class="w-full px-4 py-3 border border-slate-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent transition-all">
                        </div>

                        <div class="space-y-2">
                            <label class="block text-sm font-semibold text-slate-700">Area</label>
                            <input type="text" name="area" value="{{ request('area') }}" 
                                   placeholder="Enter area"
                                   class="w-full px-4 py-3 border border-slate-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent transition-all">
                        </div>

                        <div class="space-y-2">
                            <label class="block text-sm font-semibold text-slate-700">Min Rent</label>
                            <input type="number" step="0.01" name="min_rent" value="{{ request('min_rent') }}" 
                                   placeholder="Minimum rent"
                                   class="w-full px-4 py-3 border border-slate-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent transition-all">
                        </div>

                        <div class="space-y-2">
                            <label class="block text-sm font-semibold text-slate-700">Rooms (min)</label>
                            <input type="number" name="rooms_min" value="{{ request('rooms_min') }}" 
                                   placeholder="Min rooms"
                                   class="w-full px-4 py-3 border border-slate-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent transition-all">
                        </div>

                        <div class="space-y-2">
                            <label class="block text-sm font-semibold text-slate-700">Rooms (max)</label>
                            <input type="number" name="rooms_max" value="{{ request('rooms_max') }}" 
                                   placeholder="Max rooms"
                                   class="w-full px-4 py-3 border border-slate-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent transition-all">
                        </div>

                        <div class="space-y-2">
                            <label class="block text-sm font-semibold text-slate-700">Washrooms (min)</label>
                            <input type="number" name="washrooms_min" value="{{ request('washrooms_min') }}" 
                                   placeholder="Min washrooms"
                                   class="w-full px-4 py-3 border border-slate-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent transition-all">
                        </div>

                        <div class="space-y-2">
                            <label class="block text-sm font-semibold text-slate-700">Washrooms (max)</label>
                            <input type="number" name="washrooms_max" value="{{ request('washrooms_max') }}" 
                                   placeholder="Max washrooms"
                                   class="w-full px-4 py-3 border border-slate-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent transition-all">
                        </div>

                        <div class="space-y-2">
                            <label class="block text-sm font-semibold text-slate-700">Floor (min)</label>
                            <input type="number" name="floor_min" value="{{ request('floor_min') }}" 
                                   placeholder="Min floor"
                                   class="w-full px-4 py-3 border border-slate-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent transition-all">
                        </div>

                        <div class="space-y-2">
                            <label class="block text-sm font-semibold text-slate-700">Floor (max)</label>
                            <input type="number" name="floor_max" value="{{ request('floor_max') }}" 
                                   placeholder="Max floor"
                                   class="w-full px-4 py-3 border border-slate-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent transition-all">
                        </div>

                        <div class="space-y-2">
                            <label class="block text-sm font-semibold text-slate-700">Balcony (min)</label>
                            <input type="number" name="balcony_min" value="{{ request('balcony_min') }}" 
                                   placeholder="Min balcony"
                                   class="w-full px-4 py-3 border border-slate-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent transition-all">
                        </div>

                        <div class="space-y-2">
                            <label class="block text-sm font-semibold text-slate-700">Balcony (max)</label>
                            <input type="number" name="balcony_max" value="{{ request('balcony_max') }}" 
                                   placeholder="Max balcony"
                                   class="w-full px-4 py-3 border border-slate-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent transition-all">
                        </div>

                        <div class="space-y-2">
                            <label class="block text-sm font-semibold text-slate-700">Gas System</label>
                            <select name="gas_system" class="w-full px-4 py-3 border border-slate-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent transition-all appearance-none bg-white">
                                <option value="">Any</option>
                                <option value="Line" {{ request('gas_system')==='Line' ? 'selected' : '' }}>Line</option>
                                <option value="Cylinder" {{ request('gas_system')==='Cylinder' ? 'selected' : '' }}>Cylinder</option>
                            </select>
                        </div>

                        <div class="space-y-2">
                            <label class="block text-sm font-semibold text-slate-700">Electricity</label>
                            <select name="electricity" class="w-full px-4 py-3 border border-slate-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent transition-all appearance-none bg-white">
                                <option value="">Any</option>
                                <option value="Prepaid" {{ request('electricity')==='Prepaid' ? 'selected' : '' }}>Prepaid</option>
                                <option value="Postpaid" {{ request('electricity')==='Postpaid' ? 'selected' : '' }}>Postpaid</option>
                            </select>
                        </div>

                        <div class="space-y-2">
                            <label class="block text-sm font-semibold text-slate-700">Service Charge (min)</label>
                            <input type="number" step="0.01" name="service_charge_min" value="{{ request('service_charge_min') }}" 
                                   placeholder="Min service charge"
                                   class="w-full px-4 py-3 border border-slate-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent transition-all">
                        </div>

                        <div class="space-y-2">
                            <label class="block text-sm font-semibold text-slate-700">Service Charge (max)</label>
                            <input type="number" step="0.01" name="service_charge_max" value="{{ request('service_charge_max') }}" 
                                   placeholder="Max service charge"
                                   class="w-full px-4 py-3 border border-slate-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent transition-all">
                        </div>
                    </div>

                    <div class="flex items-center justify-between pt-6 border-t border-slate-200">
                        <label class="inline-flex items-center space-x-3">
                            <input type="checkbox" name="has_image" value="1" {{ request('has_image') ? 'checked' : '' }} class="w-5 h-5 text-primary-600 border-slate-300 rounded focus:ring-primary-500">
                            <span class="text-sm font-medium text-slate-700">Only show listings with images</span>
                        </label>
                        <div class="flex space-x-3">
                            <button type="button" id="closeAdvanced" class="px-6 py-3 border border-slate-200 rounded-xl text-slate-700 hover:bg-slate-50 transition-colors font-medium">
                                Close
                            </button>
                            <button type="submit" class="px-8 py-3 bg-gradient-to-r from-primary-600 to-accent-600 text-white rounded-xl hover:from-primary-700 hover:to-accent-700 transition-all font-semibold">
                                Apply Filters
                            </button>
                            <a href="{{ route('customer.dashboard') }}" class="px-6 py-3 border border-slate-200 rounded-xl text-slate-700 hover:bg-slate-50 transition-colors font-medium">
                                Reset All
                            </a>
                        </div>
                    </div>
                </form>
            </div>

            <!-- Modern Horizontal Properties Layout -->
            <div class="space-y-8">
                @forelse($properties as $property)
                    <div class="property-card glass-effect rounded-3xl overflow-hidden hover:shadow-2xl transition-all duration-500 group">
                        <div class="flex flex-col lg:flex-row">
                            <!-- Property Image Section -->
                            <div class="relative lg:w-2/5 h-80 lg:h-auto overflow-hidden">
                                @if($property->image)
                                    <img src="{{ asset('storage/app/public/'.$property->image) }}" alt="Property image" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                                @else
                                    <div class="w-full h-full bg-gradient-to-br from-indigo-100 via-purple-50 to-pink-100 flex items-center justify-center">
                                        <div class="text-center">
                                            <svg class="w-20 h-20 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                            </svg>
                                            <span class="text-gray-500 font-medium">No Image Available</span>
                                        </div>
                                    </div>
                                @endif
                                
                                <!-- Status & Price Overlay -->
                                <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent">
                                    <div class="absolute top-6 left-6">
                                        <span class="bg-gradient-to-r from-emerald-500 to-teal-600 text-white px-4 py-2 rounded-full text-sm font-semibold shadow-lg backdrop-blur-sm">
                                            Available
                                        </span>
                                    </div>
                                    
                                    <div class="absolute bottom-6 left-6">
                                        <div class="text-white">
                                            <span class="text-3xl font-bold">৳{{ number_format($property->rent) }}</span>
                                            <span class="text-lg opacity-90">/month</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Property Content Section -->
                            <div class="lg:w-3/5 p-8 flex flex-col justify-between">
                                <!-- Header Info -->
                                <div>
                                    <div class="flex items-start justify-between mb-4">
                                        <div>
                                            <a href="{{ route('customer.property.details', $property) }}" class="block hover:text-primary-600 transition-colors">
                                                <h3 class="text-2xl font-bold text-slate-900 mb-2 hover:text-primary-600 transition-colors cursor-pointer">{{ $property->city }} - {{ $property->location }}</h3>
                                            </a>
                                            @if($property->area)
                                                <p class="text-slate-600 flex items-center gap-2 font-medium">
                                                    <svg class="w-5 h-5 text-primary-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                                    </svg>
                                                    {{ $property->area }}
                                                </p>
                                            @endif
                                        </div>
                                        <span class="text-sm text-slate-500 bg-slate-100 px-3 py-1 rounded-full">Posted {{ $property->created_at->format('M d, Y') }}</span>
                                    </div>
                                    
                                    @if($property->description)
                                        <p class="text-slate-600 mb-6 leading-relaxed">{{ \Illuminate\Support\Str::limit($property->description, 150) }}</p>
                                    @endif
                                    
                                    <!-- Features Grid -->
                                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-6">
                                        <div class="text-center p-4 bg-gradient-to-br from-blue-50 to-indigo-50 rounded-2xl border border-blue-100">
                                            <svg class="w-8 h-8 mx-auto mb-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2 2z"/>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 21l4-4 4 4"/>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v4"/>
                                            </svg>
                                            <span class="text-sm text-blue-600 font-medium block">Rooms</span>
                                            <span class="text-xl font-bold text-blue-800">{{ $property->number_of_rooms }}</span>
                                        </div>
                                        <div class="text-center p-4 bg-gradient-to-br from-purple-50 to-pink-50 rounded-2xl border border-purple-100">
                                            <svg class="w-8 h-8 mx-auto mb-2 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 14v3m4-3v3m4-3v3M3 21h18M3 10h18M3 7l9-4 9 4M4 10v11M20 10v11"/>
                                            </svg>
                                            <span class="text-sm text-purple-600 font-medium block">Washrooms</span>
                                            <span class="text-xl font-bold text-purple-800">{{ $property->number_of_washrooms }}</span>
                                        </div>
                                        <div class="text-center p-4 bg-gradient-to-br from-green-50 to-emerald-50 rounded-2xl border border-green-100">
                                            <svg class="w-8 h-8 mx-auto mb-2 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                                            </svg>
                                            <span class="text-sm text-green-600 font-medium block">Floor</span>
                                            <span class="text-xl font-bold text-green-800">{{ $property->floor_number }}</span>
                                        </div>
                                        <div class="text-center p-4 bg-gradient-to-br from-orange-50 to-amber-50 rounded-2xl border border-orange-100">
                                            <svg class="w-8 h-8 mx-auto mb-2 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 21v-4m0 0V5a2 2 0 012-2h6.5l1 1H21l-3 6 3 6h-8.5l-1-1H5a2 2 0 00-2 2zm9-13.5V9"/>
                                            </svg>
                                            <span class="text-sm text-orange-600 font-medium block">Balcony</span>
                                            <span class="text-xl font-bold text-orange-800">{{ $property->balcony ?? 0 }}</span>
                                        </div>
                                    </div>
                                </div>
                            
                                    <!-- Additional Features & Info -->
                                    <div class="space-y-4">
                                        <!-- Utilities -->
                                        <div class="grid grid-cols-2 gap-4">
                                            <div class="bg-gradient-to-br from-cyan-50 to-blue-50 p-4 rounded-2xl border border-cyan-100">
                                                <div class="flex items-center gap-3">
                                                    <svg class="w-6 h-6 text-cyan-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 18.657A8 8 0 016.343 7.343S7 9 9 10c0-2 .5-5 2.986-7C14 5 16.09 5.777 17.656 7.343A7.975 7.975 0 0120 13a7.975 7.975 0 01-2.343 5.657z"/>
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.879 16.121A3 3 0 1012.015 11L11 14H9c0 .768.293 1.536.879 2.121z"/>
                                                    </svg>
                                                    <div>
                                                        <span class="text-sm text-cyan-600 font-medium block">Gas</span>
                                                        <span class="text-cyan-800 font-semibold">{{ $property->gas_system }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="bg-gradient-to-br from-yellow-50 to-amber-50 p-4 rounded-2xl border border-yellow-100">
                                                <div class="flex items-center gap-3">
                                                    <svg class="w-6 h-6 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                                                    </svg>
                                                    <div>
                                                        <span class="text-sm text-yellow-600 font-medium block">Electricity</span>
                                                        <span class="text-yellow-800 font-semibold">{{ $property->electricity }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        @if(!is_null($property->service_charge))
                                            <div class="bg-gradient-to-br from-amber-50 to-orange-50 p-4 rounded-2xl border border-amber-200">
                                                <div class="flex items-center gap-3">
                                                    <svg class="w-6 h-6 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                                    </svg>
                                                    <div>
                                                        <span class="text-sm text-amber-600 font-medium block">Service Charge</span>
                                                        <span class="text-amber-800 font-bold text-lg">৳{{ number_format($property->service_charge, 2) }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif

                                        <!-- Contact Info -->
                                        <div class="bg-gradient-to-br from-indigo-50 to-purple-50 p-4 rounded-2xl border border-indigo-100">
                                            <details class="group">
                                                <summary class="flex items-center gap-3 cursor-pointer text-indigo-700 hover:text-indigo-800 transition-colors">
                                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                                    </svg>
                                                    <span class="font-semibold">Contact Landlord</span>
                                                    <svg class="w-4 h-4 transition-transform group-open:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                                    </svg>
                                                </summary>
                                                <div class="mt-4 space-y-2 pl-9">
                                                    @if($property->landlord)
                                                        <p class="flex items-center gap-2 text-sm text-indigo-700">
                                                            <span class="font-medium">Name:</span> {{ $property->landlord->name }}
                                                        </p>
                                                        <p class="flex items-center gap-2 text-sm">
                                                            <span class="font-medium text-indigo-700">Email:</span> 
                                                            <a href="mailto:{{ $property->landlord->email }}" class="text-indigo-600 hover:text-indigo-800 hover:underline transition-colors">{{ $property->landlord->email }}</a>
                                                        </p>
                                                        @if($property->landlord->phone)
                                                            <p class="flex items-center gap-2 text-sm">
                                                                <span class="font-medium text-indigo-700">Phone:</span> 
                                                                <a href="tel:{{ $property->landlord->phone }}" class="text-indigo-600 hover:text-indigo-800 hover:underline transition-colors">{{ $property->landlord->phone }}</a>
                                                            </p>
                                                        @endif
                                                    @else
                                                        <p class="text-sm text-indigo-600">Landlord details unavailable.</p>
                                                    @endif
                                                </div>
                                            </details>
                                        </div>

                                        <!-- Reviews Section -->
                                        <div class="bg-gradient-to-br from-slate-50 to-gray-50 p-4 rounded-2xl border border-slate-200">
                                            <h4 class="font-bold text-slate-900 mb-4 flex items-center gap-2">
                                                <svg class="w-5 h-5 text-amber-500" fill="currentColor" viewBox="0 0 24 24">
                                                    <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                                                </svg>
                                                Reviews
                                            </h4>
                                            <div class="space-y-3 max-h-48 overflow-y-auto">
                                                @forelse($property->reviews as $review)
                                                    <div class="bg-white p-3 rounded-xl border border-slate-200 shadow-sm">
                                                        <div class="flex items-center justify-between mb-2">
                                                            <div class="flex items-center gap-2">
                                                                <span class="font-semibold text-slate-900 text-sm">{{ $review->user->name ?? 'User' }}</span>
                                                                <div class="flex items-center gap-1">
                                                                    @for($i = 1; $i <= 5; $i++)
                                                                        <svg class="w-3 h-3 {{ $i <= $review->rating ? 'text-amber-400' : 'text-gray-300' }}" fill="currentColor" viewBox="0 0 24 24">
                                                                            <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                                                                        </svg>
                                                                    @endfor
                                                                </div>
                                                            </div>
                                                            <span class="text-xs text-slate-500">{{ $review->created_at->format('M d, Y') }}</span>
                                                        </div>
                                                        @if($review->review_text)
                                                            <p class="text-sm text-slate-600 leading-relaxed">{{ $review->review_text }}</p>
                                                        @endif
                                                    </div>
                                                @empty
                                                    <p class="text-sm text-slate-500 text-center py-4">No reviews yet. Be the first to review!</p>
                                                @endforelse
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Action Buttons -->
                                    <div class="bg-white/80 backdrop-blur-sm p-6 rounded-2xl border border-white/50 shadow-xl">
                                        <!-- Primary Action -->
                                        <div class="mb-4">
                                            <button type="button" class="w-full bg-gradient-to-r from-primary-600 via-primary-700 to-accent-600 text-white px-6 py-4 rounded-2xl font-bold text-lg hover:from-primary-700 hover:via-primary-800 hover:to-accent-700 transition-all duration-300 shadow-xl hover:shadow-2xl transform hover:-translate-y-1 flex items-center justify-center gap-3" onclick="document.getElementById('review-modal-{{ $property->id }}').showModal()">
                                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/>
                                                </svg>
                                                Leave a Review
                                            </button>
                                        </div>
                                        
                                        <!-- Secondary Actions Grid -->
                                        <div class="grid grid-cols-2 gap-3 mb-4">
                                            <!-- Favorite Button -->
                                            @if(in_array($property->id, $favoriteIds))
                                                <form method="POST" action="{{ route('properties.favorites.remove', $property) }}" class="w-full">
                                                    @csrf
                                                    <button type="submit" class="w-full bg-gradient-to-r from-red-500 to-pink-500 text-white px-4 py-3 rounded-xl font-semibold hover:from-red-600 hover:to-pink-600 transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 flex items-center justify-center gap-2" title="Remove from favorites">
                                                        <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                                                            <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/>
                                                        </svg>
                                                        Favorited
                                                    </button>
                                                </form>
                                            @else
                                                <form method="POST" action="{{ route('properties.favorites.add', $property) }}" class="w-full">
                                                    @csrf
                                                    <button type="submit" class="w-full bg-gradient-to-r from-gray-100 to-gray-200 text-gray-700 px-4 py-3 rounded-xl font-semibold hover:from-red-50 hover:to-pink-50 hover:text-red-600 border border-gray-300 hover:border-red-300 transition-all duration-300 shadow-md hover:shadow-lg transform hover:-translate-y-0.5 flex items-center justify-center gap-2" title="Add to favorites">
                                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                                                        </svg>
                                                        Add to Favorites
                                                    </button>
                                                </form>
                                            @endif
                                            
                                            <!-- Compare Button -->
                                            @if(in_array($property->id, $compareList))
                                                <form method="POST" action="{{ route('properties.compare.remove', $property) }}" class="w-full">
                                                    @csrf
                                                    <button type="submit" class="w-full bg-gradient-to-r from-orange-500 to-red-500 text-white px-4 py-3 rounded-xl font-semibold hover:from-orange-600 hover:to-red-600 transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 flex items-center justify-center gap-2">
                                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"/>
                                                        </svg>
                                                        Remove Compare
                                                    </button>
                                                </form>
                                            @else
                                                <form method="POST" action="{{ route('properties.compare.add', $property) }}" class="w-full">
                                                    @csrf
                                                    <button type="submit" class="w-full {{ count($compareList) >= 3 ? 'bg-gray-300 text-gray-500 cursor-not-allowed' : 'bg-gradient-to-r from-accent-500 to-accent-600 text-white hover:from-accent-600 hover:to-accent-700' }} px-4 py-3 rounded-xl font-semibold transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 flex items-center justify-center gap-2" {{ count($compareList) >= 3 ? 'disabled' : '' }}>
                                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                                                        </svg>
                                                        {{ count($compareList) >= 3 ? 'Compare Full' : 'Add to Compare' }}
                                                    </button>
                                                </form>
                                            @endif
                                        </div>
                                        
                                        <!-- Tertiary Actions -->
                                        <div class="grid grid-cols-2 gap-3">
                                            <button type="button" class="bg-gradient-to-r from-blue-100 to-indigo-100 text-blue-700 px-4 py-3 rounded-xl font-semibold hover:from-blue-200 hover:to-indigo-200 border border-blue-200 hover:border-blue-300 transition-all duration-300 shadow-md hover:shadow-lg transform hover:-translate-y-0.5 flex items-center justify-center gap-2" onclick="document.getElementById('visit-modal-{{ $property->id }}').showModal()">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                                </svg>
                                                Request Visit
                                            </button>
                                            
                                            <button type="button" class="bg-gradient-to-r from-green-100 to-emerald-100 text-green-700 px-4 py-3 rounded-xl font-semibold hover:from-green-200 hover:to-emerald-200 border border-green-200 hover:border-green-300 transition-all duration-300 shadow-md hover:shadow-lg transform hover:-translate-y-0.5 flex items-center justify-center gap-2" onclick="document.getElementById('message-modal-{{ $property->id }}').showModal()">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                                                </svg>
                                                Message
                                            </button>
                                        </div>
                                    </div>
                                </div>
                


                            <!-- Visit Request Modal -->
                            <dialog id="visit-modal-{{ $property->id }}" class="rounded-3xl p-0 w-11/12 max-w-lg backdrop:bg-black/50">
                                <div class="bg-white/95 backdrop-blur-xl p-8 rounded-3xl border border-white/20 shadow-2xl">
                                    <div class="flex justify-between items-center mb-6">
                                        <h3 class="text-xl font-bold bg-gradient-to-r from-primary-600 to-accent-600 bg-clip-text text-transparent">Request Property Visit</h3>
                                        <button onclick="document.getElementById('visit-modal-{{ $property->id }}').close()" class="p-2 text-gray-400 hover:text-gray-600 hover:bg-gray-100 rounded-xl transition-all duration-300">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                            </svg>
                                        </button>
                                    </div>
                                    
                                    <form method="POST" action="{{ route('properties.book', $property) }}" class="space-y-6">
                                        @csrf
                                        <div>
                                            <label class="block text-sm font-semibold text-gray-700 mb-2">Visit Date</label>
                                            <input type="date" name="visit_date" required class="w-full border-2 border-gray-200 rounded-xl p-3 focus:outline-none focus:border-primary-500 focus:ring-4 focus:ring-primary-100 transition-all duration-300" min="{{ date('Y-m-d', strtotime('+1 day')) }}">
                                        </div>
                                        
                                        <div>
                                            <label class="block text-sm font-semibold text-gray-700 mb-2">Message (Optional)</label>
                                            <textarea name="message" rows="4" class="w-full border-2 border-gray-200 rounded-xl p-3 focus:outline-none focus:border-primary-500 focus:ring-4 focus:ring-primary-100 transition-all duration-300 resize-none" placeholder="Any special requests or questions..."></textarea>
                                        </div>
                                        
                                        <div class="flex gap-4 pt-4">
                                            <button type="button" onclick="document.getElementById('visit-modal-{{ $property->id }}').close()" class="flex-1 bg-gray-100 text-gray-700 py-3 rounded-xl font-medium hover:bg-gray-200 transition-all duration-300">
                                                Cancel
                                            </button>
                                            <button type="submit" class="flex-1 bg-gradient-to-r from-primary-600 to-primary-700 text-white py-3 rounded-xl font-medium hover:from-primary-700 hover:to-primary-800 transition-all duration-300 shadow-lg hover:shadow-xl">
                                                Send Request
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </dialog>
                            
                            <!-- Message Modal -->
                            <dialog id="message-modal-{{ $property->id }}" class="rounded-3xl p-0 w-11/12 max-w-lg backdrop:bg-black/50">
                                <div class="bg-white/95 backdrop-blur-xl p-8 rounded-3xl border border-white/20 shadow-2xl">
                                    <div class="flex justify-between items-center mb-6">
                                        <h3 class="text-xl font-bold bg-gradient-to-r from-primary-600 to-accent-600 bg-clip-text text-transparent">Send Message</h3>
                                        <button onclick="document.getElementById('message-modal-{{ $property->id }}').close()" class="p-2 text-gray-400 hover:text-gray-600 hover:bg-gray-100 rounded-xl transition-all duration-300">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                            </svg>
                                        </button>
                                    </div>
                                    
                                    <div class="text-center">
                                        <div class="mb-6">
                                            <div class="w-16 h-16 bg-gradient-to-r from-primary-100 to-accent-100 rounded-full flex items-center justify-center mx-auto mb-4">
                                                <svg class="w-8 h-8 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                                                </svg>
                                            </div>
                                            <p class="text-gray-600 mb-6">Start a conversation with the landlord about this property.</p>
                                        </div>
                                        
                                        <a href="{{ route('properties.messages.view', $property) }}" class="inline-flex items-center gap-2 bg-gradient-to-r from-primary-600 to-primary-700 text-white px-6 py-3 rounded-xl font-medium hover:from-primary-700 hover:to-primary-800 transition-all duration-300 shadow-lg hover:shadow-xl">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                                            </svg>
                                            Open Messages
                                        </a>
                                    </div>
                                </div>
                            </dialog>

                            <!-- Review Modal -->
                            <dialog id="review-modal-{{ $property->id }}" class="rounded-3xl p-0 w-11/12 max-w-lg backdrop:bg-black/50">
                                <div class="bg-white/95 backdrop-blur-xl p-8 rounded-3xl border border-white/20 shadow-2xl">
                                    <div class="flex justify-between items-center mb-6">
                                        <h3 class="text-xl font-bold bg-gradient-to-r from-primary-600 to-accent-600 bg-clip-text text-transparent">Leave a Review</h3>
                                        <button onclick="document.getElementById('review-modal-{{ $property->id }}').close()" class="p-2 text-gray-400 hover:text-gray-600 hover:bg-gray-100 rounded-xl transition-all duration-300">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                            </svg>
                                        </button>
                                    </div>
                                    
                                    <form method="POST" action="{{ route('properties.reviews.store', $property) }}" class="space-y-6">
                                        @csrf
                                        <div>
                                            <label class="block text-sm font-semibold text-gray-700 mb-3">Rating</label>
                                            <div class="flex gap-2">
                                                @for($i=1; $i<=5; $i++)
                                                    <label class="cursor-pointer">
                                                        <input type="radio" name="rating" value="{{ $i }}" class="sr-only peer" required>
                                                        <svg class="w-8 h-8 text-gray-300 peer-checked:text-yellow-400 hover:text-yellow-300 transition-colors" fill="currentColor" viewBox="0 0 24 24">
                                                            <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                                                        </svg>
                                                    </label>
                                                @endfor
                                            </div>
                                        </div>
                                        
                                        <div>
                                            <label class="block text-sm font-semibold text-gray-700 mb-2">Your Review (Optional)</label>
                                            <textarea name="review_text" rows="4" class="w-full border-2 border-gray-200 rounded-xl p-3 focus:outline-none focus:border-primary-500 focus:ring-4 focus:ring-primary-100 transition-all duration-300 resize-none" placeholder="Share your experience with this property..."></textarea>
                                        </div>
                                        
                                        <div class="flex gap-4 pt-4">
                                            <button type="button" onclick="document.getElementById('review-modal-{{ $property->id }}').close()" class="flex-1 bg-gray-100 text-gray-700 py-3 rounded-xl font-medium hover:bg-gray-200 transition-all duration-300">
                                                Cancel
                                            </button>
                                            <button type="submit" class="flex-1 bg-gradient-to-r from-primary-600 to-primary-700 text-white py-3 rounded-xl font-medium hover:from-primary-700 hover:to-primary-800 transition-all duration-300 shadow-lg hover:shadow-xl">
                                                Submit Review
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </dialog>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full">
                        <div class="glass-effect rounded-3xl p-12 text-center">
                            <div class="w-24 h-24 bg-gradient-to-r from-primary-100 to-accent-100 rounded-full flex items-center justify-center mx-auto mb-6">
                                <svg class="w-12 h-12 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold text-gray-800 mb-2">No Properties Found</h3>
                            <p class="text-gray-600 mb-6">We couldn't find any properties matching your criteria. Try adjusting your filters or search terms.</p>
                            <button onclick="window.location.reload()" class="bg-gradient-to-r from-primary-600 to-primary-700 text-white px-6 py-3 rounded-xl font-medium hover:from-primary-700 hover:to-primary-800 transition-all duration-300 shadow-lg hover:shadow-xl">
                                Refresh Search
                            </button>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </main>

    <!-- Footer Section -->
    <footer class="relative mt-20">
        <div class="absolute inset-0 bg-gradient-to-r from-primary-900 via-primary-800 to-accent-900"></div>
        <div class="absolute inset-0 bg-black/20"></div>
        <div class="relative px-6 py-12">
            <div class="max-w-7xl mx-auto">
                <div class="grid grid-cols-1 md:grid-cols-4 gap-8 mb-8">
                    <div class="md:col-span-2">
                        <h3 class="text-2xl font-bold text-white mb-4">BASHALAGBE?</h3>
                        <p class="text-gray-300 mb-4 leading-relaxed">Your trusted partner in finding the perfect home. We connect tenants with quality properties and reliable landlords across the city.</p>
                        <div class="flex space-x-4">
                            <a href="#" class="w-10 h-10 bg-white/10 backdrop-blur-sm rounded-xl flex items-center justify-center text-white hover:bg-white/20 transition-all duration-300">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/></svg>
                            </a>
                            <a href="#" class="w-10 h-10 bg-white/10 backdrop-blur-sm rounded-xl flex items-center justify-center text-white hover:bg-white/20 transition-all duration-300">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M22.46 6c-.77.35-1.6.58-2.46.69.88-.53 1.56-1.37 1.88-2.38-.83.5-1.75.85-2.72 1.05C18.37 4.5 17.26 4 16 4c-2.35 0-4.27 1.92-4.27 4.29 0 .34.04.67.11.98C8.28 9.09 5.11 7.38 3 4.79c-.37.63-.58 1.37-.58 2.15 0 1.49.75 2.81 1.91 3.56-.71 0-1.37-.2-1.95-.5v.03c0 2.08 1.48 3.82 3.44 4.21a4.22 4.22 0 0 1-1.93.07 4.28 4.28 0 0 0 4 2.98 8.521 8.521 0 0 1-5.33 1.84c-.34 0-.68-.02-1.02-.06C3.44 20.29 5.7 21 8.12 21 16 21 20.33 14.46 20.33 8.79c0-.19 0-.37-.01-.56.84-.6 1.56-1.36 2.14-2.23z"/></svg>
                            </a>
                            <a href="#" class="w-10 h-10 bg-white/10 backdrop-blur-sm rounded-xl flex items-center justify-center text-white hover:bg-white/20 transition-all duration-300">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg>
                            </a>
                        </div>
                    </div>
                    
                    <div>
                        <h4 class="text-lg font-semibold text-white mb-4">Quick Links</h4>
                        <ul class="space-y-2">
                            <li><a href="#" class="text-gray-300 hover:text-white transition-colors">Find Properties</a></li>
                            <li><a href="#" class="text-gray-300 hover:text-white transition-colors">List Property</a></li>
                            <li><a href="#" class="text-gray-300 hover:text-white transition-colors">About Us</a></li>
                            <li><a href="#" class="text-gray-300 hover:text-white transition-colors">Contact</a></li>
                        </ul>
                    </div>
                    
                    <div>
                        <h4 class="text-lg font-semibold text-white mb-4">Support</h4>
                        <ul class="space-y-2">
                            <li><a href="#" class="text-gray-300 hover:text-white transition-colors">Help Center</a></li>
                            <li><a href="#" class="text-gray-300 hover:text-white transition-colors">Privacy Policy</a></li>
                            <li><a href="#" class="text-gray-300 hover:text-white transition-colors">Terms of Service</a></li>
                            <li><a href="#" class="text-gray-300 hover:text-white transition-colors">FAQ</a></li>
                        </ul>
                    </div>
                </div>
                
                <div class="border-t border-white/10 pt-8 text-center">
                    <p class="text-gray-300">&copy; 2024 BASHALAGBE? All Rights Reserved. Made with ❤️ for better living.</p>
                </div>
            </div>
        </div>
    </footer>

    <script>
        function openBookingModal(propertyId) {
            document.getElementById('booking-modal-' + propertyId).showModal();
        }
        
        function closeBookingModal(propertyId) {
            document.getElementById('booking-modal-' + propertyId).close();
        }
        
        // Advanced Filters Toggle
        document.addEventListener('DOMContentLoaded', function() {
            const advancedFiltersBtn = document.getElementById('toggleAdvanced');
            const advancedFilters = document.getElementById('advancedFilters');
            const closeAdvanced = document.getElementById('closeAdvanced');
            
            if (advancedFiltersBtn && advancedFilters) {
                advancedFiltersBtn.addEventListener('click', function() {
                    advancedFilters.classList.toggle('hidden');
                });
            }
            
            if (closeAdvanced && advancedFilters) {
                closeAdvanced.addEventListener('click', function() {
                    advancedFilters.classList.add('hidden');
                });
            }
            
            // Set minimum checkout date when checkin date changes
            const checkinInputs = document.querySelectorAll('input[name="check_in_date"]');
            checkinInputs.forEach(function(checkinInput) {
                checkinInput.addEventListener('change', function() {
                    const checkoutInput = this.closest('form').querySelector('input[name="check_out_date"]');
                    const checkinDate = new Date(this.value);
                    checkinDate.setDate(checkinDate.getDate() + 1);
                    checkoutInput.min = checkinDate.toISOString().split('T')[0];
                });
            });
        });
    </script>

</body>
</html>
