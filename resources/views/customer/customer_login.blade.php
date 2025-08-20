<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Login - BASHALAGBE?</title>
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
<body class="min-h-screen flex flex-col items-center justify-center p-6">

    <!-- Login Form Container -->
    <div class="bg-white p-8 sm:p-12 rounded-xl shadow-lg max-w-md w-full border border-gray-200">
        <div class="text-center mb-8">
            <a href="#" class="text-2xl sm:text-3xl font-bold text-indigo-600 tracking-tight">BASHALAGBE?</a>
            <h1 class="text-3xl sm:text-4xl font-extrabold text-gray-900 mt-4">Customer Login</h1>
        </div>

        <!-- Login Form -->
        <!-- Replace the action with your actual Laravel route -->
        <form action="{{ route('customer.login.submit') }}" method="POST" class="space-y-6">
            <!-- CSRF Token for Laravel -->
            @csrf

            <!-- Email Input -->
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email Address</label>
                <div class="mt-1">
                    <input id="email" name="email" type="email" autocomplete="email" required
                           class="appearance-none block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                </div>
            </div>

            <!-- Password Input -->
            <div>
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <div class="mt-1">
                    <input id="password" name="password" type="password" autocomplete="current-password" required
                           class="appearance-none block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                </div>
            </div>

            <!-- Login Button -->
            <div>
                <button type="submit"
                        class="w-full flex justify-center py-2 px-4 border border-transparent rounded-lg shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-all duration-300">
                    Login
                </button>
            </div>
        </form>

        <!-- Registration Option -->
        <div class="mt-6 text-center">
            <p class="text-sm text-gray-600">
                Don't have an account?
                <a href="{{ route('customer.register') }}" class="font-medium text-indigo-600 hover:text-indigo-500 transition-colors duration-200">
                    Register here
                </a>
            </p>
        </div>
    </div>

</body>
</html>
