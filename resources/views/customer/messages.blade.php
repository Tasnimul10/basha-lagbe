<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Messages - BASHALAGBE?</title>
    <script src="https://cdn.tailwindcss.com"></script>
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
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap');
        
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
        
        .floating-animation {
            animation: float 6s ease-in-out infinite;
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }
        
        .chat-bubble {
            position: relative;
        }
        
        .chat-bubble::before {
            content: '';
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            width: 0;
            height: 0;
        }
        
        .chat-bubble-left::before {
            left: -8px;
            border-top: 8px solid transparent;
            border-bottom: 8px solid transparent;
            border-right: 8px solid rgba(255, 255, 255, 0.9);
        }
        
        .chat-bubble-right::before {
            right: -8px;
            border-top: 8px solid transparent;
            border-bottom: 8px solid transparent;
            border-left: 8px solid #10b981;
        }
        
        .message-card {
            background: linear-gradient(145deg, rgba(255, 255, 255, 0.1), rgba(255, 255, 255, 0.05));
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
    </style>
</head>
<body class="min-h-screen gradient-bg relative overflow-x-hidden">

    <!-- Background Decorations -->
    <div class="fixed inset-0 overflow-hidden pointer-events-none">
        <div class="absolute -top-40 -right-40 w-80 h-80 bg-white/10 rounded-full floating-animation"></div>
        <div class="absolute top-1/2 -left-20 w-60 h-60 bg-accent-400/20 rounded-full floating-animation" style="animation-delay: -2s;"></div>
        <div class="absolute bottom-20 right-1/4 w-40 h-40 bg-primary-400/20 rounded-full floating-animation" style="animation-delay: -4s;"></div>
    </div>

    <!-- Header Section -->
    <header class="relative glass-effect border-b border-white/20 p-4">
        <div class="max-w-7xl mx-auto flex justify-between items-center">
            <a href="{{ route('customer.dashboard') }}" class="flex items-center space-x-3">
                <div class="w-10 h-10 bg-gradient-to-r from-primary-500 to-accent-500 rounded-xl flex items-center justify-center">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                    </svg>
                </div>
                <span class="text-2xl font-bold bg-gradient-to-r from-primary-600 to-accent-600 bg-clip-text text-transparent">BASHALAGBE?</span>
            </a>
            <nav class="flex items-center space-x-6">
                <a href="{{ route('customer.dashboard') }}" class="text-white/80 hover:text-white transition-all duration-300 font-medium">Dashboard</a>
                <a href="{{ route('customer.favorites') }}" class="text-white/80 hover:text-white transition-all duration-300 font-medium">Favorites</a>
                <a href="{{ route('customer.bookings') }}" class="text-white/80 hover:text-white transition-all duration-300 font-medium">Visit Requests</a>
                <a href="{{ route('customer.messages') }}" class="text-white font-semibold bg-white/20 px-4 py-2 rounded-xl backdrop-blur-sm">Messages</a>
                <form action="{{ route('customer.logout') }}" method="POST" class="inline">
                    @csrf
                    <button type="submit" class="text-white/80 hover:text-white transition-all duration-300 font-medium">Logout</button>
                </form>
            </nav>
        </div>
    </header>

    <!-- Main Content -->
    <main class="relative flex-1 p-6">
        <div class="max-w-6xl mx-auto">
            <!-- Header Card -->
            <div class="glass-effect rounded-3xl p-8 mb-8 text-center card-hover">
                <div class="flex items-center justify-center space-x-3 mb-4">
                    <div class="w-16 h-16 bg-gradient-to-br from-primary-400 to-accent-500 rounded-2xl flex items-center justify-center shadow-lg">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                        </svg>
                    </div>
                    <h1 class="text-4xl font-bold bg-gradient-to-r from-primary-600 to-accent-600 bg-clip-text text-transparent">My Messages</h1>
                </div>
                <p class="text-white/90 text-lg">Connect with property owners seamlessly and manage your conversations</p>
            </div>

            <!-- Messages Stats -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <div class="message-card rounded-2xl p-6 card-hover">
                    <div class="flex items-center space-x-4">
                        <div class="w-12 h-12 bg-primary-500 rounded-xl flex items-center justify-center">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-white">Total Conversations</h3>
                            <p class="text-2xl font-bold text-primary-300">{{ $conversations->count() }}</p>
                        </div>
                    </div>
                </div>
                <div class="message-card rounded-2xl p-6 card-hover">
                    <div class="flex items-center space-x-4">
                        <div class="w-12 h-12 bg-accent-500 rounded-xl flex items-center justify-center">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-white">Recent Activity</h3>
                            <p class="text-2xl font-bold text-accent-300">Today</p>
                        </div>
                    </div>
                </div>
                <div class="message-card rounded-2xl p-6 card-hover">
                    <div class="flex items-center space-x-4">
                        <div class="w-12 h-12 bg-gradient-to-r from-primary-500 to-accent-500 rounded-xl flex items-center justify-center">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-white">Status</h3>
                            <p class="text-2xl font-bold text-green-300">Active</p>
                        </div>
                    </div>
                </div>
            </div>

            @if(session('success'))
                <div class="glass-effect border border-green-400/30 text-white px-6 py-4 rounded-2xl mb-6">
                    <div class="flex items-center space-x-3">
                        <svg class="w-5 h-5 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                        <span>{{ session('success') }}</span>
                    </div>
                </div>
            @endif

            @if($conversations->count() > 0)
                <div class="space-y-4">
                    @foreach($conversations as $conversation)
                        <div class="message-card rounded-2xl p-8 card-hover group">
                            <div class="flex items-center justify-between">
                                <div class="flex items-start space-x-6 flex-1">
                                    <!-- Property Avatar -->
                                    <div class="w-16 h-16 bg-gradient-to-br from-primary-400 via-primary-500 to-accent-500 rounded-2xl flex items-center justify-center flex-shrink-0 shadow-lg">
                                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2 2z"/>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V5a2 2 0 012-2h4a2 2 0 012 2v2"/>
                                        </svg>
                                    </div>
                                    
                                    <!-- Conversation Details -->
                                    <div class="flex-1 min-w-0">
                                        <div class="flex items-center space-x-2 mb-2">
                                            <h3 class="text-xl font-bold text-white truncate group-hover:text-primary-300 transition-colors">
                                                {{ $conversation['property']->city }} - {{ $conversation['property']->location }}
                                            </h3>
                                            @if($conversation['unread_count'] > 0)
                                                <span class="bg-gradient-to-r from-red-500 to-pink-500 text-white text-xs px-3 py-1 rounded-full font-semibold animate-pulse shadow-lg">
                                                    {{ $conversation['unread_count'] }}
                                                </span>
                                            @endif
                                        </div>
                                        
                                        <div class="flex items-center space-x-2 mb-3">
                                            <svg class="w-4 h-4 text-accent-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                            </svg>
                                            <p class="text-white/80 font-medium">{{ $conversation['landlord']->name }}</p>
                                        </div>
                                        
                                        @if($conversation['last_message'])
                                            <div class="bg-gradient-to-r from-white/10 to-white/5 rounded-xl p-4 mb-4 border border-white/10">
                                                <p class="text-white/95 text-sm leading-relaxed">
                                                    <span class="font-semibold text-primary-300">{{ $conversation['last_message']->sender_type === 'customer' ? 'You' : 'Landlord' }}:</span>
                                                    {{ Str::limit($conversation['last_message']->message, 80) }}
                                                </p>
                                                <div class="flex items-center justify-between mt-3">
                                                    <p class="text-white/60 text-xs flex items-center space-x-1">
                                                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                                        </svg>
                                                        <span>{{ $conversation['last_message']->created_at->diffForHumans() }}</span>
                                                    </p>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                
                                <!-- Action Button -->
                                <div class="flex-shrink-0 ml-6">
                                    <a href="{{ route('properties.messages.view', $conversation['property']) }}" class="bg-gradient-to-r from-primary-500 to-accent-500 text-white px-6 py-3 rounded-2xl hover:from-primary-600 hover:to-accent-600 transition-all duration-300 font-semibold flex items-center space-x-2 shadow-lg hover:shadow-xl transform hover:scale-105">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                                        </svg>
                                        <span>Open Chat</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <!-- No Conversations -->
                <div class="message-card rounded-3xl p-16 text-center card-hover">
                    <div class="w-32 h-32 bg-gradient-to-br from-primary-400/20 to-accent-500/20 rounded-full flex items-center justify-center mx-auto mb-8 backdrop-blur-sm border border-white/10">
                        <div class="w-20 h-20 bg-gradient-to-br from-primary-500 to-accent-500 rounded-full flex items-center justify-center">
                            <svg class="w-12 h-12 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                            </svg>
                        </div>
                    </div>
                    <h3 class="text-3xl font-bold text-white mb-4">No conversations yet</h3>
                    <p class="text-white/80 mb-10 max-w-lg mx-auto text-lg leading-relaxed">Start exploring amazing properties and connect with landlords to begin meaningful conversations about your next home.</p>
                    <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
                         <a href="{{ route('customer.properties') }}" class="bg-gradient-to-r from-primary-500 to-accent-500 text-white px-8 py-4 rounded-2xl hover:from-primary-600 hover:to-accent-600 transition-all duration-300 font-semibold inline-flex items-center space-x-3 shadow-lg hover:shadow-xl transform hover:scale-105">
                             <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                 <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                             </svg>
                             <span>Browse Properties</span>
                         </a>
                         <a href="{{ route('customer.dashboard') }}" class="bg-white/10 hover:bg-white/20 text-white px-8 py-4 rounded-2xl transition-all duration-300 font-semibold inline-flex items-center space-x-3 backdrop-blur-sm border border-white/20">
                             <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                 <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2 2z"/>
                             </svg>
                             <span>Go to Dashboard</span>
                         </a>
                     </div>
                </div>
            @endif
        </div>
    </main>

    <!-- Footer -->
    <footer class="relative message-card border-t border-white/20 p-8 mt-16 card-hover">
        <div class="max-w-7xl mx-auto">
            <div class="flex flex-col md:flex-row items-center justify-between space-y-4 md:space-y-0">
                <div class="flex items-center space-x-4">
                    <div class="w-12 h-12 bg-gradient-to-br from-primary-500 to-accent-500 rounded-2xl flex items-center justify-center shadow-lg">
                        <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                        </svg>
                    </div>
                    <div>
                        <span class="text-white font-bold text-xl bg-gradient-to-r from-primary-300 to-accent-300 bg-clip-text text-transparent">BASHALAGBE?</span>
                        <p class="text-white/70 text-sm">Your trusted property platform</p>
                    </div>
                </div>
                <div class="text-center md:text-right">
                    <p class="text-white/80 text-sm font-medium">&copy; 2024 BASHALAGBE? All rights reserved.</p>
                    <p class="text-white/60 text-xs mt-1">Connecting you with your perfect home</p>
                </div>
            </div>
        </div>
    </footer>

</body>
</html>