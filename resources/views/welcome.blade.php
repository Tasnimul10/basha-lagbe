<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BASHALAGBE? - Find Your Perfect Home</title>
    <!-- Tailwind CSS CDN -->
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
                        'display': ['Inter', 'system-ui', 'sans-serif'],
                        'body': ['Inter', 'system-ui', 'sans-serif']
                    }
                }
            }
        }
    </script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap');
        body {
            font-family: 'Inter', system-ui, sans-serif;
        }
        .gradient-bg {
            background: linear-gradient(135deg, #0ea5e9 0%, #3b82f6 50%, #8b5cf6 100%);
        }
        .glass-effect {
            backdrop-filter: blur(16px);
            background: rgba(255, 255, 255, 0.95);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
    </style>
</head>
<body class="min-h-screen bg-gradient-to-br from-slate-50 to-blue-50">

    <!-- Header Section -->
    <header class="glass-effect sticky top-0 z-50 px-6 py-4">
        <div class="max-w-7xl mx-auto flex justify-between items-center">
            <!-- Logo -->
            <a href="#" class="text-2xl sm:text-3xl font-bold bg-gradient-to-r from-primary-600 to-accent-600 bg-clip-text text-transparent tracking-tight">
                BASHALAGBE?
            </a>

            <!-- Navigation Links -->
            <nav class="flex items-center space-x-6">
                <a href="{{ route('admin.login') }}" class="text-slate-600 hover:text-primary-600 transition-all duration-300 text-sm font-medium px-3 py-2 rounded-lg hover:bg-white/50">
                    Admin Portal
                </a>
                <a href="#features" class="text-slate-600 hover:text-primary-600 transition-all duration-300 text-sm font-medium px-3 py-2 rounded-lg hover:bg-white/50">
                    Features
                </a>
                <a href="#about" class="text-slate-600 hover:text-primary-600 transition-all duration-300 text-sm font-medium px-3 py-2 rounded-lg hover:bg-white/50">
                    About
                </a>
            </nav>
        </div>
    </header>

    <!-- Hero Section -->
    <main class="flex-grow flex flex-col items-center justify-center px-6 py-20 text-center relative overflow-hidden">
        <!-- Background Elements -->
        <div class="absolute inset-0 overflow-hidden">
            <div class="absolute -top-40 -right-40 w-80 h-80 bg-primary-200 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-pulse"></div>
            <div class="absolute -bottom-40 -left-40 w-80 h-80 bg-accent-200 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-pulse"></div>
        </div>
        
        <div class="relative z-10 max-w-5xl mx-auto">
            <!-- Main Heading -->
            <div class="mb-8">
                <h1 class="text-5xl sm:text-6xl lg:text-7xl font-bold text-slate-900 mb-6 leading-tight">
                    Find Your
                    <span class="bg-gradient-to-r from-primary-600 via-blue-600 to-accent-600 bg-clip-text text-transparent">
                        Perfect Home
                    </span>
                </h1>
                <p class="text-xl sm:text-2xl text-slate-600 mb-4 max-w-3xl mx-auto leading-relaxed">
                    Discover amazing rental properties or list your own with ease. 
                    <span class="font-semibold text-slate-700">Join thousands of satisfied users</span> in Bangladesh's premier rental platform.
                </p>
                <div class="flex items-center justify-center space-x-6 text-sm text-slate-500 mb-12">
                    <div class="flex items-center">
                        <svg class="w-5 h-5 text-green-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                        </svg>
                        Verified Properties
                    </div>
                    <div class="flex items-center">
                        <svg class="w-5 h-5 text-green-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                        </svg>
                        Secure Transactions
                    </div>
                    <div class="flex items-center">
                        <svg class="w-5 h-5 text-green-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                        </svg>
                        24/7 Support
                    </div>
                </div>
            </div>
            
            <!-- CTA Buttons -->
            <div class="flex flex-col sm:flex-row items-center justify-center gap-6 mb-16">
                <!-- Customer Button -->
                <a href="{{ route('customer.login') }}" class="group relative overflow-hidden bg-gradient-to-r from-primary-600 to-blue-600 text-white px-8 py-4 rounded-2xl font-semibold text-lg shadow-xl hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-1 min-w-[200px]">
                    <div class="absolute inset-0 bg-gradient-to-r from-primary-700 to-blue-700 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    <div class="relative flex items-center justify-center">
                        <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                        </svg>
                        Find a Home
                    </div>
                </a>

                <!-- Landlord Button -->
                <a href="{{ route('landlord.login') }}" class="group relative overflow-hidden bg-white text-primary-600 border-2 border-primary-600 px-8 py-4 rounded-2xl font-semibold text-lg shadow-xl hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-1 hover:bg-primary-50 min-w-[200px]">
                    <div class="relative flex items-center justify-center">
                        <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z"></path>
                        </svg>
                        List Property
                    </div>
                </a>
            </div>
            
            <!-- Stats Section -->
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-8 max-w-3xl mx-auto">
                <div class="text-center">
                    <div class="text-3xl font-bold text-slate-900 mb-2">1000+</div>
                    <div class="text-slate-600">Properties Listed</div>
                </div>
                <div class="text-center">
                    <div class="text-3xl font-bold text-slate-900 mb-2">500+</div>
                    <div class="text-slate-600">Happy Tenants</div>
                </div>
                <div class="text-center">
                    <div class="text-3xl font-bold text-slate-900 mb-2">50+</div>
                    <div class="text-slate-600">Cities Covered</div>
                </div>
            </div>
        </div>
    </main>

    <!-- Features Section -->
    <section id="features" class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-slate-900 mb-4">Why Choose BASHALAGBE?</h2>
                <p class="text-xl text-slate-600 max-w-3xl mx-auto">Experience the future of property rental with our innovative platform designed for modern living.</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="text-center p-8 rounded-2xl bg-gradient-to-br from-primary-50 to-blue-50 hover:shadow-xl transition-all duration-300">
                    <div class="w-16 h-16 bg-gradient-to-r from-primary-500 to-blue-500 rounded-2xl flex items-center justify-center mx-auto mb-6">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-slate-900 mb-4">Verified Properties</h3>
                    <p class="text-slate-600">Every property is thoroughly verified by our team to ensure quality and authenticity for your peace of mind.</p>
                </div>
                
                <div class="text-center p-8 rounded-2xl bg-gradient-to-br from-accent-50 to-purple-50 hover:shadow-xl transition-all duration-300">
                    <div class="w-16 h-16 bg-gradient-to-r from-accent-500 to-purple-500 rounded-2xl flex items-center justify-center mx-auto mb-6">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-slate-900 mb-4">Instant Communication</h3>
                    <p class="text-slate-600">Connect directly with property owners through our built-in messaging system for quick responses.</p>
                </div>
                
                <div class="text-center p-8 rounded-2xl bg-gradient-to-br from-green-50 to-emerald-50 hover:shadow-xl transition-all duration-300">
                    <div class="w-16 h-16 bg-gradient-to-r from-green-500 to-emerald-500 rounded-2xl flex items-center justify-center mx-auto mb-6">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-slate-900 mb-4">Secure Platform</h3>
                    <p class="text-slate-600">Your data and transactions are protected with enterprise-grade security measures.</p>
                </div>
            </div>
        </div>
    </section>
    
    <!-- About Section -->
    <section id="about" class="py-20 bg-gradient-to-br from-slate-50 to-blue-50">
        <div class="max-w-7xl mx-auto px-6">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <div>
                    <h2 class="text-4xl font-bold text-slate-900 mb-6">Revolutionizing Property Rental in Bangladesh</h2>
                    <p class="text-lg text-slate-600 mb-6 leading-relaxed">
                        BASHALAGBE? is more than just a rental platform – we're building the future of property discovery and management in Bangladesh. Our mission is to make finding and listing properties as simple as a few clicks.
                    </p>
                    <p class="text-lg text-slate-600 mb-8 leading-relaxed">
                        Whether you're a tenant searching for your dream home or a landlord looking to maximize your property's potential, we provide the tools and support you need to succeed.
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4">
                        <a href="{{ route('customer.login') }}" class="inline-flex items-center justify-center px-6 py-3 bg-primary-600 text-white rounded-xl hover:bg-primary-700 transition-colors font-medium">
                            Start Your Search
                        </a>
                        <a href="{{ route('landlord.login') }}" class="inline-flex items-center justify-center px-6 py-3 border-2 border-primary-600 text-primary-600 rounded-xl hover:bg-primary-50 transition-colors font-medium">
                            List Your Property
                        </a>
                    </div>
                </div>
                <div class="relative">
                    <div class="aspect-square bg-gradient-to-br from-primary-100 to-accent-100 rounded-3xl flex items-center justify-center">
                        <svg class="w-48 h-48 text-primary-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer Section -->
    <footer class="bg-slate-900 text-white py-16">
        <div class="max-w-7xl mx-auto px-6">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8 mb-8">
                <div class="md:col-span-2">
                    <a href="#" class="text-3xl font-bold bg-gradient-to-r from-primary-400 to-accent-400 bg-clip-text text-transparent mb-4 block">
                        BASHALAGBE?
                    </a>
                    <p class="text-slate-300 mb-6 max-w-md">
                        Bangladesh's premier property rental platform. Find your perfect home or list your property with ease.
                    </p>
                    <div class="flex space-x-4">
                        <a href="#" class="w-10 h-10 bg-slate-800 rounded-lg flex items-center justify-center hover:bg-primary-600 transition-colors">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/>
                            </svg>
                        </a>
                        <a href="#" class="w-10 h-10 bg-slate-800 rounded-lg flex items-center justify-center hover:bg-primary-600 transition-colors">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M22.46 6c-.77.35-1.6.58-2.46.69.88-.53 1.56-1.37 1.88-2.38-.83.5-1.75.85-2.72 1.05C18.37 4.5 17.26 4 16 4c-2.35 0-4.27 1.92-4.27 4.29 0 .34.04.67.11.98C8.28 9.09 5.11 7.38 3 4.79c-.37.63-.58 1.37-.58 2.15 0 1.49.75 2.81 1.91 3.56-.71 0-1.37-.2-1.95-.5v.03c0 2.08 1.48 3.82 3.44 4.21a4.22 4.22 0 0 1-1.93.07 4.28 4.28 0 0 0 4 2.98 8.521 8.521 0 0 1-5.33 1.84c-.34 0-.68-.02-1.02-.06C3.44 20.29 5.7 21 8.12 21 16 21 20.33 14.46 20.33 8.79c0-.19 0-.37-.01-.56.84-.6 1.56-1.36 2.14-2.23z"/>
                            </svg>
                        </a>
                        <a href="#" class="w-10 h-10 bg-slate-800 rounded-lg flex items-center justify-center hover:bg-primary-600 transition-colors">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
                            </svg>
                        </a>
                    </div>
                </div>
                
                <div>
                    <h3 class="text-lg font-semibold mb-4">Quick Links</h3>
                    <ul class="space-y-2 text-slate-300">
                        <li><a href="{{ route('customer.login') }}" class="hover:text-primary-400 transition-colors">Find Properties</a></li>
                        <li><a href="{{ route('landlord.login') }}" class="hover:text-primary-400 transition-colors">List Property</a></li>
                        <li><a href="{{ route('admin.login') }}" class="hover:text-primary-400 transition-colors">Admin Portal</a></li>
                        <li><a href="#about" class="hover:text-primary-400 transition-colors">About Us</a></li>
                    </ul>
                </div>
                
                <div>
                    <h3 class="text-lg font-semibold mb-4">Support</h3>
                    <ul class="space-y-2 text-slate-300">
                        <li><a href="#" class="hover:text-primary-400 transition-colors">Help Center</a></li>
                        <li><a href="#" class="hover:text-primary-400 transition-colors">Contact Us</a></li>
                        <li><a href="#" class="hover:text-primary-400 transition-colors">Privacy Policy</a></li>
                        <li><a href="#" class="hover:text-primary-400 transition-colors">Terms of Service</a></li>
                    </ul>
                </div>
            </div>
            
            <div class="border-t border-slate-800 pt-8 text-center text-slate-400">
                <p>&copy; 2024 BASHALAGBE? All Rights Reserved. Made with ❤️ in Bangladesh.</p>
            </div>
        </div>
    </footer>

</body>
</html>
