<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BASHALAGBE?</title>
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
<body class="min-h-screen flex flex-col">

    <!-- Header Section -->
    <header class="bg-white shadow-md p-4 flex justify-between items-center">
        <!-- Logo -->
        <a href="#" class="text-2xl sm:text-3xl font-bold text-indigo-600 tracking-tight">BASHALAGBE?</a>

        <!-- Navigation Links -->
        <nav class="flex items-center space-x-4 sm:space-x-6">
            <!-- Admin Page Button -->
            <a href="{{ route('admin.login') }}" class="text-gray-600 hover:text-indigo-600 transition-colors duration-200 text-sm sm:text-base font-medium">Admin</a>
            <!-- FAQ Page Button -->
            <a href="#" class="text-gray-600 hover:text-indigo-600 transition-colors duration-200 text-sm sm:text-base font-medium">FAQ</a>
            <!-- About Us Page Button -->
            <a href="#" class="text-gray-600 hover:text-indigo-600 transition-colors duration-200 text-sm sm:text-base font-medium">About Us</a>
        </nav>
    </header>

    <!-- Hero Section -->
    <main class="flex-grow flex flex-col items-center justify-center p-6 text-center bg-gray-50">
        <div class="bg-white p-8 sm:p-12 rounded-xl shadow-lg max-w-2xl w-full border border-gray-200">
            <h1 class="text-4xl sm:text-5xl font-extrabold text-gray-900 mb-4 tracking-tight">
                Your Next Home Awaits.
            </h1>
            <p class="text-lg sm:text-xl text-gray-600 mb-10 max-w-md mx-auto">
                Discover the perfect place to rent, or easily list your property for others to find.
            </p>
            
            <div class="flex flex-col sm:flex-row items-center justify-center space-y-6 sm:space-y-0 sm:space-x-8">
                <!-- Customer Button -->
                <!-- The href="#" has been updated to point to the customer login route. -->
                <a href="{{ route('customer.login') }}" class="w-full sm:w-1/2 p-4 text-center text-white bg-indigo-600 rounded-xl shadow-lg hover:bg-indigo-700 focus:outline-none focus:ring-4 focus:ring-offset-2 focus:ring-indigo-500 transition-all duration-300 transform hover:scale-105 font-bold text-xl">
                    <span role="img" aria-label="home" class="mr-2">🏠</span> Find a Home
                </a>

                <!-- Landlord Button -->
                <!-- The href now points to the landlord login route. -->
                <a href="{{ route('landlord.login') }}" class="w-full sm:w-1/2 p-4 text-center text-indigo-600 bg-white border-2 border-indigo-600 rounded-xl shadow-lg hover:bg-indigo-50 focus:outline-none focus:ring-4 focus:ring-offset-2 focus:ring-indigo-500 transition-all duration-300 transform hover:scale-105 font-bold text-xl">
                    <span role="img" aria-label="key" class="mr-2">🔑</span> List a Property
                </a>
            </div>
        </div>
    </main>

    <!-- Footer Section -->
    <footer class="bg-gray-200 p-4 text-center text-gray-600 text-sm">
        &copy; 2024 BASHALAGBE? All Rights Reserved.
    </footer>

</body>
</html>
