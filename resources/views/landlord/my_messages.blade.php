<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Messages - Landlord Dashboard</title>
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
                        }
                    },
                    fontFamily: {
                        sans: ['Inter', 'system-ui', 'sans-serif']
                    }
                }
            }
        }
    </script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        .glass-effect {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
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
<body class="min-h-screen bg-gradient-to-br from-primary-900 via-primary-800 to-accent-900 font-sans">
    <!-- Background Decorations -->
    <div class="fixed inset-0 overflow-hidden pointer-events-none">
        <div class="absolute top-1/4 left-1/4 w-64 h-64 bg-primary-400/20 rounded-full blur-3xl floating"></div>
        <div class="absolute bottom-1/4 right-1/4 w-96 h-96 bg-accent-400/20 rounded-full blur-3xl floating" style="animation-delay: -3s;"></div>
        <div class="absolute top-3/4 left-1/2 w-48 h-48 bg-primary-300/20 rounded-full blur-3xl floating" style="animation-delay: -1.5s;"></div>
    </div>

    <!-- Header -->
    <header class="relative glass-effect border-b border-white/20 p-6">
        <div class="max-w-6xl mx-auto flex justify-between items-center">
            <div class="flex items-center space-x-3">
                <div class="w-10 h-10 bg-gradient-to-r from-primary-400 to-accent-400 rounded-xl flex items-center justify-center">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2 2z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V5a2 2 0 012-2h4a2 2 0 012 2v2"/>
                    </svg>
                </div>
                <span class="text-2xl font-bold bg-gradient-to-r from-primary-400 to-accent-400 bg-clip-text text-transparent">Basha Lagbe</span>
            </div>
            <nav class="flex items-center space-x-6">
                <a href="{{ route('landlord.dashboard') }}" class="text-white/80 hover:text-white transition-colors duration-200 font-medium">Dashboard</a>
                <a href="{{ route('landlord.bookings') }}" class="text-white/80 hover:text-white transition-colors duration-200 font-medium flex items-center space-x-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                    </svg>
                    <span>Visit Requests</span>
                </a>
                <a href="{{ route('landlord.messages') }}" class="text-white hover:text-white transition-colors duration-200 font-medium border-b-2 border-primary-400 flex items-center space-x-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                    </svg>
                    <span>Messages</span>
                </a>
                <form method="POST" action="{{ route('landlord.logout') }}" class="inline">
                    @csrf
                    <button class="bg-gradient-to-r from-red-500 to-red-600 hover:from-red-600 hover:to-red-700 text-white px-4 py-2 rounded-xl transition-all duration-200 transform hover:scale-105 font-medium">Logout</button>
                </form>
            </nav>
        </div>
    </header>

    <main class="relative p-6">
        <div class="max-w-6xl mx-auto">
            <!-- Page Header -->
            <div class="mb-8">
                <h1 class="text-4xl font-bold bg-gradient-to-r from-white to-primary-200 bg-clip-text text-transparent mb-2">My Messages</h1>
                <p class="text-white/70">Manage conversations with your property inquirers</p>
            </div>

            <!-- Success Message -->
            @if(session('success'))
                <div class="glass-effect border border-green-400/30 bg-gradient-to-r from-green-500/20 to-emerald-500/20 text-white px-6 py-4 rounded-2xl mb-6 flex items-center space-x-3">
                    <svg class="w-5 h-5 text-green-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                    </svg>
                    <span>{{ session('success') }}</span>
                </div>
            @endif

            @if($conversations->count() > 0)
                <!-- Conversations List -->
                <div class="glass-effect rounded-3xl overflow-hidden border border-white/20">
                    @foreach($conversations as $conversation)
                        <div class="border-b border-white/10 last:border-b-0 p-6 hover:bg-white/5 transition-all duration-300 group">
                            <div class="flex items-center justify-between">
                                <div class="flex-1">
                                    <!-- Property Info -->
                                    <div class="flex items-center space-x-3 mb-3">
                                        <div class="w-12 h-12 bg-gradient-to-r from-primary-400 to-accent-400 rounded-2xl flex items-center justify-center">
                                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                                            </svg>
                                        </div>
                                        <div>
                                            <h3 class="text-xl font-semibold text-white group-hover:text-primary-300 transition-colors">
                                                {{ $conversation['property']->city }} - {{ $conversation['property']->location }}
                                            </h3>
                                            <p class="text-white/60 text-sm">Property Conversation</p>
                                        </div>
                                    </div>
                                    
                                    <!-- Customer Info -->
                                    <div class="flex items-center space-x-4 mb-3">
                                        <div class="flex items-center space-x-2">
                                            <svg class="w-4 h-4 text-primary-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                            </svg>
                                            <span class="text-white/80 font-medium">{{ $conversation['customer']->name }}</span>
                                        </div>
                                        <div class="flex items-center space-x-2">
                                            <svg class="w-4 h-4 text-accent-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                            </svg>
                                            <span class="text-white/70 text-sm">{{ $conversation['customer']->email }}</span>
                                        </div>
                                    </div>
                                    
                                    <!-- Last Message -->
                                    @if($conversation['last_message'])
                                        <div class="bg-white/5 rounded-xl p-3 mb-2">
                                            <p class="text-white/90 text-sm">
                                                <span class="font-semibold text-primary-300">{{ $conversation['last_message']->sender_type === 'landlord' ? 'You' : 'Customer' }}:</span>
                                                {{ Str::limit($conversation['last_message']->message, 80) }}
                                            </p>
                                            <p class="text-white/50 text-xs mt-1 flex items-center space-x-1">
                                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                                </svg>
                                                <span>{{ $conversation['last_message']->created_at->diffForHumans() }}</span>
                                            </p>
                                        </div>
                                    @endif
                                </div>
                                
                                <!-- Actions -->
                                <div class="flex items-center space-x-4 ml-6">
                                    @if($conversation['unread_count'] > 0)
                                        <div class="bg-gradient-to-r from-red-500 to-pink-500 text-white text-xs px-3 py-1 rounded-full font-semibold flex items-center space-x-1">
                                            <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M10 2L3 7v11a1 1 0 001 1h3v-8h6v8h3a1 1 0 001-1V7l-7-5z"/>
                                            </svg>
                                            <span>{{ $conversation['unread_count'] }}</span>
                                        </div>
                                    @endif
                                    <a href="{{ route('landlord.properties.messages.view', [$conversation['property'], $conversation['customer']->id]) }}" 
                                       class="bg-gradient-to-r from-primary-500 to-accent-500 hover:from-primary-600 hover:to-accent-600 text-white px-6 py-3 rounded-xl transition-all duration-200 transform hover:scale-105 font-medium flex items-center space-x-2 shadow-lg">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                                        </svg>
                                        <span>View Chat</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <!-- Empty State -->
                <div class="glass-effect rounded-3xl p-12 text-center border border-white/20">
                    <div class="w-24 h-24 bg-gradient-to-r from-primary-400/20 to-accent-400/20 rounded-3xl flex items-center justify-center mx-auto mb-6">
                        <svg class="w-12 h-12 text-primary-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-semibold text-white mb-3">No conversations yet</h3>
                    <p class="text-white/70 mb-6 max-w-md mx-auto">When customers inquire about your properties, their messages will appear here for easy management.</p>
                    <a href="{{ route('landlord.dashboard') }}" 
                       class="inline-flex items-center space-x-2 bg-gradient-to-r from-primary-500 to-accent-500 hover:from-primary-600 hover:to-accent-600 text-white px-8 py-4 rounded-xl transition-all duration-200 transform hover:scale-105 font-medium shadow-lg">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2 2z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V5a2 2 0 012-2h4a2 2 0 012 2v2"/>
                        </svg>
                        <span>Go to Dashboard</span>
                    </a>
                </div>
            @endif
        </div>
    </main>

    <!-- Footer -->
    <footer class="relative glass-effect border-t border-white/20 mt-12 p-6">
        <div class="max-w-6xl mx-auto text-center">
            <div class="flex items-center justify-center space-x-3 mb-4">
                <div class="w-8 h-8 bg-gradient-to-r from-primary-400 to-accent-400 rounded-xl flex items-center justify-center">
                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2 2z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V5a2 2 0 012-2h4a2 2 0 012 2v2"/>
                    </svg>
                </div>
                <span class="text-xl font-bold bg-gradient-to-r from-primary-400 to-accent-400 bg-clip-text text-transparent">Basha Lagbe</span>
            </div>
            <p class="text-white/60 text-sm">&copy; 2024 Basha Lagbe. All rights reserved.</p>
        </div>
    </footer>

</body>
</html>