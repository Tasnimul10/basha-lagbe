<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landlord Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-gray-50">
    <header class="bg-white shadow p-4 flex justify-between items-center">
        <h1 class="text-xl font-bold">Landlord Dashboard</h1>
        <form method="POST" action="{{ route('landlord.logout') }}">
            @csrf
            <button class="bg-red-600 text-white py-1 px-3 rounded">Logout</button>
        </form>
    </header>

    <main class="p-6">
        <div class="bg-white p-6 rounded-lg shadow">
            <h2 class="text-lg font-semibold mb-2">Welcome, {{ auth('landlord')->user()->name }}</h2>
            <p class="text-gray-600">This is your dashboard. You can add and manage properties here.</p>
            <div class="mt-4">
                <a href="{{ route('landlord.properties.create') }}" class="inline-block bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">List a Property</a>
            </div>
        </div>
    </main>
</body>
</html>


