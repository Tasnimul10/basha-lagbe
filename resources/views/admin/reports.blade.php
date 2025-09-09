<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Property Reports - Admin Dashboard</title>
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
        
        .floating {
            animation: float 6s ease-in-out infinite;
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
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
                        <i class="fas fa-flag text-white text-2xl"></i>
                    </div>
                    <div>
                        <h1 class="text-3xl font-bold text-white mb-1">Property Reports</h1>
                        <p class="text-white/90 text-lg">Manage reported properties and user complaints</p>
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
                <a href="{{ route('admin.dashboard') }}" class="flex-1 text-center py-3 px-6 rounded-lg text-white/80 hover:bg-white/10 hover:text-white font-semibold transition-all duration-300">
                    <i class="fas fa-tachometer-alt mr-2"></i>
                    Dashboard
                </a>
                <a href="{{ route('admin.reports') }}" class="flex-1 text-center py-3 px-6 rounded-lg bg-white/20 text-white font-semibold transition-all duration-300">
                    <i class="fas fa-flag mr-2"></i>
                    Reports
                </a>
            </div>
        </nav>

        <main class="max-w-7xl mx-auto p-8">
            <!-- Success/Error Messages -->
            @if(session('status'))
                <div class="bg-green-500/20 border border-green-500/30 text-green-100 px-6 py-4 rounded-xl mb-6 backdrop-blur-sm">
                    <div class="flex items-center space-x-3">
                        <i class="fas fa-check-circle text-green-400"></i>
                        <span>{{ session('status') }}</span>
                    </div>
                </div>
            @endif

            @if(session('error'))
                <div class="bg-red-500/20 border border-red-500/30 text-red-100 px-6 py-4 rounded-xl mb-6 backdrop-blur-sm">
                    <div class="flex items-center space-x-3">
                        <i class="fas fa-exclamation-circle text-red-400"></i>
                        <span>{{ session('error') }}</span>
                    </div>
                </div>
            @endif

            <!-- Reports Statistics -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <div class="glass-effect rounded-2xl p-6">
                    <div class="flex items-center space-x-4">
                        <div class="w-12 h-12 bg-red-500 rounded-xl flex items-center justify-center">
                            <i class="fas fa-exclamation-triangle text-white"></i>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-white">Total Reports</h3>
                            <p class="text-2xl font-bold text-red-300">{{ $reports->count() }}</p>
                        </div>
                    </div>
                </div>
                <div class="glass-effect rounded-2xl p-6">
                    <div class="flex items-center space-x-4">
                        <div class="w-12 h-12 bg-yellow-500 rounded-xl flex items-center justify-center">
                            <i class="fas fa-clock text-white"></i>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-white">Pending</h3>
                            <p class="text-2xl font-bold text-yellow-300">{{ $reports->where('status', 'pending')->count() }}</p>
                        </div>
                    </div>
                </div>
                <div class="glass-effect rounded-2xl p-6">
                    <div class="flex items-center space-x-4">
                        <div class="w-12 h-12 bg-green-500 rounded-xl flex items-center justify-center">
                            <i class="fas fa-check-circle text-white"></i>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-white">Resolved</h3>
                            <p class="text-2xl font-bold text-green-300">{{ $reports->where('status', 'resolved')->count() }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Reports Table -->
            <div class="glass-effect rounded-2xl overflow-hidden">
                <div class="p-6 border-b border-white/20">
                    <h2 class="text-2xl font-bold text-white flex items-center space-x-3">
                        <i class="fas fa-list text-primary-400"></i>
                        <span>Property Reports</span>
                    </h2>
                </div>
                
                @if($reports->count() > 0)
                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead class="bg-white/10">
                                <tr>
                                    <th class="text-left py-4 px-6 text-white font-semibold">Property</th>
                                    <th class="text-left py-4 px-6 text-white font-semibold">Reported By</th>
                                    <th class="text-left py-4 px-6 text-white font-semibold">Reason</th>
                                    <th class="text-left py-4 px-6 text-white font-semibold">Status</th>
                                    <th class="text-left py-4 px-6 text-white font-semibold">Date</th>
                                    <th class="text-left py-4 px-6 text-white font-semibold">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($reports as $report)
                                    <tr class="border-b border-white/10 hover:bg-white/5 transition-colors">
                                        <td class="py-4 px-6">
                                            @if($report->property)
                                                <div class="text-white font-medium">Property in {{ $report->property->location }}, {{ $report->property->city }}</div>
                                                <div class="text-white/70 text-sm">{{ $report->property->location }}</div>
                                                <div class="text-white/50 text-xs">by {{ $report->property->landlord->name ?? 'Unknown' }}</div>
                                            @else
                                                <span class="text-red-400">Property Deleted</span>
                                            @endif
                                        </td>
                                        <td class="py-4 px-6">
                                            <div class="text-white font-medium">{{ $report->user->name }}</div>
                                            <div class="text-white/70 text-sm">{{ $report->user->email }}</div>
                                        </td>
                                        <td class="py-4 px-6">
                                            <div class="text-white font-medium capitalize">{{ str_replace('_', ' ', $report->reason) }}</div>
                                            @if($report->description)
                                                <div class="text-white/70 text-sm mt-1">{{ Str::limit($report->description, 50) }}</div>
                                            @endif
                                        </td>
                                        <td class="py-4 px-6">
                                            @if($report->status === 'pending')
                                                <span class="bg-yellow-500/20 text-yellow-300 px-3 py-1 rounded-full text-sm font-medium">
                                                    <i class="fas fa-clock mr-1"></i>Pending
                                                </span>
                                            @elseif($report->status === 'reviewed')
                                                <span class="bg-blue-500/20 text-blue-300 px-3 py-1 rounded-full text-sm font-medium">
                                                    <i class="fas fa-eye mr-1"></i>Reviewed
                                                </span>
                                            @else
                                                <span class="bg-green-500/20 text-green-300 px-3 py-1 rounded-full text-sm font-medium">
                                                    <i class="fas fa-check mr-1"></i>Resolved
                                                </span>
                                            @endif
                                        </td>
                                        <td class="py-4 px-6 text-white/70">{{ $report->created_at->format('M d, Y') }}</td>
                                        <td class="py-4 px-6">
                                            <div class="flex space-x-2">
                                                @if($report->status !== 'resolved')
                                                    <!-- Status Update Form -->
                                                    <form method="POST" action="{{ route('admin.reports.update-status', $report) }}" class="inline">
                                                        @csrf
                                                        @method('PATCH')
                                                        <select name="status" onchange="this.form.submit()" class="bg-white/10 text-white border border-white/20 rounded-lg px-3 py-1 text-sm">
                                                            <option value="pending" {{ $report->status === 'pending' ? 'selected' : '' }}>Pending</option>
                                                            <option value="reviewed" {{ $report->status === 'reviewed' ? 'selected' : '' }}>Reviewed</option>
                                                            <option value="resolved" {{ $report->status === 'resolved' ? 'selected' : '' }}>Resolved</option>
                                                        </select>
                                                    </form>
                                                    
                                                    @if($report->property)
                                                        <!-- Delete Property Button -->
                                                        <form method="POST" action="{{ route('admin.reports.delete-property', $report) }}" class="inline" onsubmit="return confirm('Are you sure you want to delete this property? This action cannot be undone.')">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded-lg text-sm transition-colors">
                                                                <i class="fas fa-trash mr-1"></i>Delete Property
                                                            </button>
                                                        </form>
                                                    @endif
                                                @else
                                                    <span class="text-green-400 text-sm">
                                                        <i class="fas fa-check-circle mr-1"></i>Completed
                                                    </span>
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="p-12 text-center">
                        <div class="w-24 h-24 bg-white/10 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-flag text-white/50 text-3xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-white mb-2">No Reports Found</h3>
                        <p class="text-white/70">There are currently no property reports to review.</p>
                    </div>
                @endif
            </div>
        </main>
    </div>
</body>
</html>