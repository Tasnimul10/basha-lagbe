<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landlord Register</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        if (window.tailwind) {
            tailwind.config = { theme: { extend: {} } }
        }
    </script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap');
        body { font-family: 'Inter', sans-serif; }
    </style>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>
<body class="min-h-screen flex items-center justify-center bg-gray-50">
    <div class="bg-white p-8 rounded-xl shadow-lg w-full max-w-md">
        <h1 class="text-2xl font-bold mb-6 text-center">Create Landlord Account</h1>

        <form method="POST" action="{{ route('landlord.register.submit') }}" class="space-y-4">
            @csrf

            <div>
                <label class="block text-sm font-medium text-gray-700">Name</label>
                <input type="text" name="name" value="{{ old('name') }}" required class="mt-1 w-full border rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                @error('name')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" name="email" value="{{ old('email') }}" required class="mt-1 w-full border rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                @error('email')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Phone (optional)</label>
                <input type="text" name="phone" value="{{ old('phone') }}" class="mt-1 w-full border rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                @error('phone')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Password</label>
                <input type="password" name="password" required class="mt-1 w-full border rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                @error('password')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Confirm Password</label>
                <input type="password" name="password_confirmation" required class="mt-1 w-full border rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-indigo-500">
            </div>

            <div class="flex items-center justify-between">
                <a href="{{ route('landlord.login') }}" class="text-sm text-indigo-600 hover:underline">Already have an account? Login</a>
                <a href="{{ url('/') }}" class="text-sm text-gray-600 hover:underline">Back home</a>
            </div>

            <button type="submit" class="w-full bg-indigo-600 text-white py-2 rounded-lg hover:bg-indigo-700">Create account</button>
        </form>
    </div>
</body>
</html>


