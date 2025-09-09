<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Messages - {{ $property->city }} - {{ $property->location }} - BASHALAGBE?</title>
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
        
        .gradient-bg {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
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
            max-width: 70%;
        }
        
        .chat-bubble::before {
            content: '';
            position: absolute;
            top: 20px;
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
            border-left: 8px solid #0ea5e9;
        }
        
        .message-input {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
        }
    </style>
</head>
<body class="min-h-screen gradient-bg relative overflow-x-hidden flex flex-col">

    <!-- Background Decorations -->
    <div class="fixed inset-0 overflow-hidden pointer-events-none">
        <div class="absolute -top-40 -right-40 w-80 h-80 bg-white/10 rounded-full floating-animation"></div>
        <div class="absolute top-1/2 -left-20 w-60 h-60 bg-accent-400/20 rounded-full floating-animation" style="animation-delay: -2s;"></div>
        <div class="absolute bottom-20 right-1/4 w-40 h-40 bg-primary-400/20 rounded-full floating-animation" style="animation-delay: -4s;"></div>
    </div>

    <!-- Header Section -->
    <header class="relative glass-effect border-b border-white/20 p-4 flex-shrink-0">
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
                <a href="{{ route('customer.messages') }}" class="text-white/80 hover:text-white transition-all duration-300 font-medium">All Messages</a>
                <form action="{{ route('customer.logout') }}" method="POST" class="inline">
                    @csrf
                    <button type="submit" class="text-white/80 hover:text-white transition-all duration-300 font-medium">Logout</button>
                </form>
            </nav>
        </div>
    </header>

    <!-- Main Content -->
    <main class="relative flex-1 p-6 flex flex-col">
        <div class="max-w-4xl mx-auto flex-1 flex flex-col">
            <!-- Property Info Card -->
            <div class="glass-effect rounded-2xl p-6 mb-6 flex-shrink-0">
                <div class="flex items-center space-x-4">
                    <div class="w-16 h-16 bg-gradient-to-r from-primary-400 to-accent-400 rounded-2xl flex items-center justify-center flex-shrink-0">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2 2z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V5a2 2 0 012-2h4a2 2 0 012 2v2"/>
                        </svg>
                    </div>
                    <div class="flex-1">
                        <h1 class="text-2xl font-bold text-white mb-1">{{ $property->city }} - {{ $property->location }}</h1>
                        <div class="flex items-center space-x-4 text-white/80">
                            <div class="flex items-center space-x-2">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                </svg>
                                <span>{{ $landlord->name }}</span>
                            </div>
                            <div class="flex items-center space-x-2">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"/>
                                </svg>
                                <span>৳{{ number_format($property->rent, 2) }}/month</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @if(session('success'))
                <div class="glass-effect border border-green-400/30 text-white px-6 py-4 rounded-2xl mb-6 flex-shrink-0">
                    <div class="flex items-center space-x-3">
                        <svg class="w-5 h-5 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                        <span>{{ session('success') }}</span>
                    </div>
                </div>
            @endif

            <!-- Chat Container -->
            <div class="glass-effect rounded-2xl flex-1 flex flex-col mb-6 overflow-hidden">
                <!-- Chat Header -->
                <div class="p-4 border-b border-white/20 flex-shrink-0">
                    <div class="flex items-center space-x-3">
                        <div class="w-10 h-10 bg-gradient-to-r from-primary-400 to-accent-400 rounded-xl flex items-center justify-center">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                            </svg>
                        </div>
                        <div>
                            <h2 class="text-lg font-semibold text-white">Chat with {{ $landlord->name }}</h2>
                            <p class="text-white/60 text-sm">Property conversation</p>
                        </div>
                    </div>
                </div>
                
                <!-- Messages Area -->
                <div class="flex-1 p-4 overflow-y-auto space-y-4" id="messages-container" style="max-height: 400px;">
                    @if($messages->count() > 0)
                        @foreach($messages as $message)
                            <div class="flex {{ $message->sender_type === 'customer' ? 'justify-end' : 'justify-start' }}">
                                <div class="chat-bubble {{ $message->sender_type === 'customer' ? 'chat-bubble-right bg-gradient-to-r from-primary-500 to-primary-600 text-white' : 'chat-bubble-left bg-white/90 text-gray-800' }} rounded-2xl px-4 py-3 shadow-lg">
                                    <p class="text-sm leading-relaxed">{{ $message->message }}</p>
                                    <p class="text-xs mt-2 {{ $message->sender_type === 'customer' ? 'text-primary-100' : 'text-gray-500' }}">
                                        {{ $message->created_at->format('M j, Y g:i A') }}
                                    </p>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="flex-1 flex items-center justify-center">
                            <div class="text-center py-8">
                                <div class="w-16 h-16 bg-gradient-to-r from-primary-400/20 to-accent-400/20 rounded-2xl flex items-center justify-center mx-auto mb-4">
                                    <svg class="w-8 h-8 text-white/60" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                                    </svg>
                                </div>
                                <h3 class="text-lg font-semibold text-white mb-2">Start the conversation!</h3>
                                <p class="text-white/60">Send your first message to {{ $landlord->name }}</p>
                            </div>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Message Input Form -->
            <form action="{{ route('properties.message.send', $property->id) }}" method="POST" class="glass-effect rounded-2xl p-6 flex-shrink-0">
                @csrf
                <div class="flex space-x-4">
                    <div class="flex-1">
                        <textarea name="message" id="message" rows="3" class="w-full bg-white/10 border border-white/20 rounded-xl px-4 py-3 text-white placeholder-white/60 focus:outline-none focus:ring-2 focus:ring-primary-400 focus:border-transparent resize-none" placeholder="Type your message here..." required></textarea>
                    </div>
                    <div class="flex flex-col justify-end">
                        <button type="submit" class="bg-gradient-to-r from-primary-500 to-primary-600 hover:from-primary-600 hover:to-primary-700 text-white p-3 rounded-xl transition-all duration-200 transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-primary-400 focus:ring-offset-2 focus:ring-offset-transparent shadow-lg">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/>
                            </svg>
                        </button>
                    </div>
                </div>
                <div class="mt-3 flex items-center justify-between text-white/60 text-sm">
                    <span>Press Enter to send</span>
                    <div class="flex items-center space-x-2">
                        <div class="w-2 h-2 bg-green-400 rounded-full animate-pulse"></div>
                        <span>Online</span>
                    </div>
                </div>
            </form>
        </div>
    </main>

    <!-- Footer -->
    <footer class="glass-effect border-t border-white/20 p-6">
        <div class="max-w-4xl mx-auto flex items-center justify-between">
            <div class="flex items-center space-x-3">
                <div class="w-8 h-8 bg-gradient-to-r from-primary-400 to-accent-400 rounded-lg flex items-center justify-center">
                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2 2z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V5a2 2 0 012-2h4a2 2 0 012 2v2"/>
                    </svg>
                </div>
                <span class="text-lg font-bold bg-gradient-to-r from-primary-400 to-accent-400 bg-clip-text text-transparent">Basha Lagbe</span>
            </div>
            <div class="text-white/60 text-sm">
                <p>&copy; 2024 Basha Lagbe. Connecting homes, building communities.</p>
            </div>
        </div>
    </footer>

    <script>
        // Auto-scroll to bottom of messages
        const messagesContainer = document.getElementById('messages-container');
        if (messagesContainer) {
            messagesContainer.scrollTop = messagesContainer.scrollHeight;
        }

        // Auto-resize textarea
        const textarea = document.getElementById('message');
        textarea.addEventListener('input', function() {
            this.style.height = 'auto';
            this.style.height = Math.min(this.scrollHeight, 120) + 'px';
        });

        // Send message on Enter (but allow Shift+Enter for new line)
        textarea.addEventListener('keydown', function(e) {
            if (e.key === 'Enter' && !e.shiftKey) {
                e.preventDefault();
                this.closest('form').submit();
            }
        });
    </script>

</body>
</html>