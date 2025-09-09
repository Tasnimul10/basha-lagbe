<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - BASHALAGBE</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: {
                            50: '#ecfdf5',
                            100: '#d1fae5',
                            200: '#a7f3d0',
                            300: '#6ee7b7',
                            400: '#34d399',
                            500: '#10b981',
                            600: '#059669',
                            700: '#047857',
                            800: '#065f46',
                            900: '#064e3b'
                        },
                        accent: {
                            50: '#f0fdfa',
                            100: '#ccfbf1',
                            200: '#99f6e4',
                            300: '#5eead4',
                            400: '#2dd4bf',
                            500: '#14b8a6',
                            600: '#0d9488',
                            700: '#0f766e',
                            800: '#115e59',
                            900: '#134e4a'
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
        .glass-effect {
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
        }
        
        .gradient-bg {
            background: linear-gradient(135deg, #0d9488 0%, #059669 50%, #047857 100%);
        }
        
        .card-hover {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        .card-hover:hover {
            transform: translateY(-4px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
        }
        
        .floating {
            animation: float 6s ease-in-out infinite;
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }
        
        .admin-card {
            background: linear-gradient(145deg, rgba(255, 255, 255, 0.1), rgba(255, 255, 255, 0.05));
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
    </style>
</head>
<body class="min-h-screen gradient-bg font-sans">
    <!-- Background Decorations -->
    <div class="fixed inset-0 overflow-hidden pointer-events-none">
        <div class="absolute top-20 left-20 w-72 h-72 bg-primary-400/10 rounded-full blur-3xl floating"></div>
        <div class="absolute top-40 right-20 w-96 h-96 bg-accent-400/10 rounded-full blur-3xl floating" style="animation-delay: -2s;"></div>
        <div class="absolute bottom-20 left-1/3 w-80 h-80 bg-primary-300/10 rounded-full blur-3xl floating" style="animation-delay: -4s;"></div>
    </div>

    <div class="relative z-10">
        <!-- Header -->
        <header class="glass-effect border-b border-white/20 p-6">
            <div class="max-w-7xl mx-auto flex items-center justify-between">
                <div class="flex items-center space-x-6">
                    <div class="w-16 h-16 bg-gradient-to-br from-primary-400 to-accent-500 rounded-2xl flex items-center justify-center shadow-lg">
                        <i class="fas fa-shield-alt text-white text-2xl"></i>
                    </div>
                    <div>
                        <h1 class="text-3xl font-bold text-white mb-1">Admin Dashboard</h1>
                        <p class="text-white/90 text-lg">Manage properties and oversee platform operations</p>
                    </div>
                </div>
                <div class="flex items-center space-x-4">
                    <div class="text-white/80 text-right mr-4">
                        <p class="text-sm">Welcome back,</p>
                        <p class="font-semibold">Administrator</p>
                    </div>
                    <form method="POST" action="{{ route('admin.logout') }}">
                        @csrf
                        <button class="bg-red-500 hover:bg-red-600 text-white px-6 py-3 rounded-xl transition-all duration-300 font-semibold flex items-center space-x-2 shadow-lg hover:shadow-xl transform hover:scale-105">
                            <i class="fas fa-sign-out-alt"></i>
                            <span>Logout</span>
                        </button>
                    </form>
                </div>
            </div>
        </header>

        <!-- Navigation Tabs -->
        <nav class="max-w-7xl mx-auto px-8 pt-6">
            <div class="flex space-x-1 bg-white/10 rounded-xl p-1 backdrop-blur-sm">
                <a href="{{ route('admin.dashboard') }}" class="flex-1 text-center py-3 px-6 rounded-lg bg-white/20 text-white font-semibold transition-all duration-300">
                    <i class="fas fa-tachometer-alt mr-2"></i>
                    Dashboard
                </a>
                <a href="{{ route('admin.reports') }}" class="flex-1 text-center py-3 px-6 rounded-lg text-white/80 hover:bg-white/10 hover:text-white font-semibold transition-all duration-300">
                    <i class="fas fa-flag mr-2"></i>
                    Reports
                </a>
            </div>
        </nav>

        <main class="max-w-7xl mx-auto p-8">
            <!-- Statistics Cards -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-10">
                <div class="admin-card rounded-2xl p-6 card-hover">
                    <div class="flex items-center space-x-4">
                        <div class="w-12 h-12 bg-primary-500 rounded-xl flex items-center justify-center">
                            <i class="fas fa-building text-white"></i>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-white">Total Properties</h3>
                            <p class="text-2xl font-bold text-primary-300">{{ $properties->count() }}</p>
                        </div>
                    </div>
                </div>
                <div class="admin-card rounded-2xl p-6 card-hover">
                    <div class="flex items-center space-x-4">
                        <div class="w-12 h-12 bg-green-500 rounded-xl flex items-center justify-center">
                            <i class="fas fa-check-circle text-white"></i>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-white">Approved</h3>
                            <p class="text-2xl font-bold text-green-300">{{ $properties->where('status', 'approved')->count() }}</p>
                        </div>
                    </div>
                </div>
                <div class="admin-card rounded-2xl p-6 card-hover">
                    <div class="flex items-center space-x-4">
                        <div class="w-12 h-12 bg-yellow-500 rounded-xl flex items-center justify-center">
                            <i class="fas fa-clock text-white"></i>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-white">Pending</h3>
                            <p class="text-2xl font-bold text-yellow-300">{{ $properties->where('status', 'pending')->count() }}</p>
                        </div>
                    </div>
                </div>
                <div class="admin-card rounded-2xl p-6 card-hover">
                    <div class="flex items-center space-x-4">
                        <div class="w-12 h-12 bg-red-500 rounded-xl flex items-center justify-center">
                            <i class="fas fa-times-circle text-white"></i>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-white">Rejected</h3>
                            <p class="text-2xl font-bold text-red-300">{{ $properties->where('status', 'rejected')->count() }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Property Management Section -->
            <div class="admin-card rounded-3xl p-8 card-hover">
                <div class="flex items-center justify-between mb-8">
                    <div class="flex items-center space-x-4">
                        <div class="w-12 h-12 bg-gradient-to-r from-primary-500 to-accent-500 rounded-xl flex items-center justify-center">
                            <i class="fas fa-cogs text-white"></i>
                        </div>
                        <div>
                            <h2 class="text-2xl font-bold text-white">Property Management</h2>
                            <p class="text-white/80">Review and manage property listings</p>
                        </div>
                    </div>
                    <div class="text-white/60">
                        <i class="fas fa-database text-2xl"></i>
                    </div>
                </div>
                
                @if(session('status'))
                    <div class="bg-gradient-to-r from-green-500/20 to-emerald-500/20 border border-green-400/30 text-white px-6 py-4 rounded-2xl mb-6 backdrop-blur-sm">
                        <div class="flex items-center space-x-3">
                            <i class="fas fa-check-circle text-green-400"></i>
                            <span>{{ session('status') }}</span>
                        </div>
                    </div>
                @endif

                <div class="overflow-x-auto">
                    <div class="min-w-full">
                        <!-- Table Header -->
                        <div class="grid grid-cols-7 gap-4 bg-gradient-to-r from-primary-600/20 to-accent-600/20 backdrop-blur-sm rounded-2xl p-4 mb-4 border border-white/10">
                            <div class="text-white/90 font-semibold text-sm uppercase tracking-wider">ID</div>
                            <div class="text-white/90 font-semibold text-sm uppercase tracking-wider">Landlord</div>
                            <div class="text-white/90 font-semibold text-sm uppercase tracking-wider">Location</div>
                            <div class="text-white/90 font-semibold text-sm uppercase tracking-wider">City</div>
                            <div class="text-white/90 font-semibold text-sm uppercase tracking-wider">Rent</div>
                            <div class="text-white/90 font-semibold text-sm uppercase tracking-wider">Status</div>
                            <div class="text-white/90 font-semibold text-sm uppercase tracking-wider">Actions</div>
                        </div>
                        
                        <!-- Table Body -->
                        <div class="space-y-3">
                            @forelse($properties as $property)
                                <div class="grid grid-cols-7 gap-4 bg-white/5 hover:bg-white/10 backdrop-blur-sm rounded-2xl p-4 border border-white/10 transition-all duration-300 group">
                                    <div class="text-white/90 font-medium flex items-center">
                                        <span class="bg-primary-500/20 text-primary-300 px-3 py-1 rounded-lg text-sm font-semibold">#{{ $property->id }}</span>
                                    </div>
                                    <div class="text-white/90 flex items-center">
                                        <div class="flex items-center space-x-2">
                                            <div class="w-8 h-8 bg-gradient-to-r from-primary-400 to-accent-400 rounded-lg flex items-center justify-center">
                                                <i class="fas fa-user text-white text-xs"></i>
                                            </div>
                                            <span>{{ $property->landlord->name ?? 'N/A' }}</span>
                                        </div>
                                    </div>
                                    <div class="text-white/90 flex items-center">
                                        <div class="flex items-center space-x-2">
                                            <i class="fas fa-map-marker-alt text-accent-400 text-sm"></i>
                                            <span>{{ $property->location }}</span>
                                        </div>
                                    </div>
                                    <div class="text-white/90 flex items-center">
                                        <span class="bg-accent-500/20 text-accent-300 px-3 py-1 rounded-lg text-sm">{{ $property->city }}</span>
                                    </div>
                                    <div class="text-white/90 flex items-center">
                                        <span class="font-bold text-primary-300">৳{{ number_format($property->rent, 0) }}</span>
                                    </div>
                                    <div class="flex items-center">
                                        <span class="px-3 py-1 text-xs font-semibold rounded-full 
                                            @if($property->status === 'approved') bg-green-500/20 text-green-300 border border-green-400/30
                                            @elseif($property->status === 'rejected') bg-red-500/20 text-red-300 border border-red-400/30
                                            @else bg-yellow-500/20 text-yellow-300 border border-yellow-400/30 @endif">
                                            {{ ucfirst($property->status) }}
                                        </span>
                                    </div>
                                    <div class="flex items-center">
                                        <form method="POST" action="{{ route('admin.properties.update-status', $property) }}" class="w-full">
                                            @csrf
                                            @method('PATCH')
                                            <select name="status" onchange="this.form.submit()" class="w-full bg-white/10 border border-white/20 text-white rounded-xl px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent backdrop-blur-sm">
                                                <option value="pending" {{ $property->status === 'pending' ? 'selected' : '' }} class="bg-gray-800 text-white">Pending</option>
                                                <option value="approved" {{ $property->status === 'approved' ? 'selected' : '' }} class="bg-gray-800 text-white">Approved</option>
                                                <option value="rejected" {{ $property->status === 'rejected' ? 'selected' : '' }} class="bg-gray-800 text-white">Rejected</option>
                                            </select>
                                        </form>
                                    </div>
                                </div>
                            @empty
                                <div class="text-center py-16">
                                    <div class="w-24 h-24 bg-white/10 rounded-full flex items-center justify-center mx-auto mb-6">
                                        <i class="fas fa-inbox text-white/60 text-3xl"></i>
                                    </div>
                                    <h3 class="text-xl font-bold text-white mb-2">No properties found</h3>
                                    <p class="text-white/70">There are currently no properties to manage.</p>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <!-- Footer -->
        <footer class="admin-card rounded-3xl p-8 mt-16 mx-8 card-hover">
            <div class="flex flex-col md:flex-row items-center justify-between space-y-4 md:space-y-0">
                <div class="flex items-center space-x-4">
                    <div class="w-12 h-12 bg-gradient-to-br from-primary-500 to-accent-500 rounded-2xl flex items-center justify-center shadow-lg">
                        <i class="fas fa-shield-alt text-white text-xl"></i>
                    </div>
                    <div>
                        <span class="text-white font-bold text-xl bg-gradient-to-r from-primary-300 to-accent-300 bg-clip-text text-transparent">BASHALAGBE</span>
                        <p class="text-white/70 text-sm">Admin Control Panel</p>
                    </div>
                </div>
                <div class="text-center md:text-right">
                    <p class="text-white/80 text-sm font-medium">© 2024 BASHALAGBE. All rights reserved.</p>
                    <p class="text-white/60 text-xs mt-1">Secure administrative access</p>
                </div>
            </div>
        </footer>
    </div>
</body>
</html>
