<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen flex items-center justify-center bg-gray-50">
    <div class="bg-white p-8 rounded-xl shadow-lg w-full max-w-md">
        <h1 class="text-2xl font-bold mb-6 text-center">Admin Login</h1>

        <form method="POST" action="{{ route('admin.login.submit') }}" class="space-y-4">
            @csrf
            <div>
                <label class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" name="email" value="{{ old('email') }}" required autofocus class="mt-1 w-full border rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                @error('email')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Password</label>
                <input type="password" name="password" required class="mt-1 w-full border rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-indigo-500">
            </div>

            <div class="flex items-center justify-between">
                <label class="inline-flex items-center">
                    <input type="checkbox" name="remember" class="rounded">
                    <span class="ml-2 text-sm text-gray-700">Remember me</span>
                </label>
                <a href="{{ url('/') }}" class="text-sm text-indigo-600 hover:underline">Back home</a>
            </div>

            <button type="submit" class="w-full bg-indigo-600 text-white py-2 rounded-lg hover:bg-indigo-700">Login</button>
        </form>
    </div>
</body>
</html>
