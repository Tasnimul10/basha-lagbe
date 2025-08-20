<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List a Property</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-gray-50">
    <header class="bg-white shadow p-4 flex justify-between items-center">
        <h1 class="text-xl font-bold">List a Property</h1>
        <a href="{{ route('landlord.dashboard') }}" class="text-indigo-600">Back to Dashboard</a>
    </header>

    <main class="p-6">
        <div class="bg-white p-6 rounded-lg shadow max-w-3xl mx-auto">
            <form method="POST" action="{{ route('landlord.properties.store') }}" enctype="multipart/form-data" class="grid grid-cols-1 md:grid-cols-2 gap-4">
                @csrf

                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700">Location</label>
                    <input type="text" name="location" value="{{ old('location') }}" required class="mt-1 w-full border rounded-lg p-2">
                    @error('location')<p class="text-sm text-red-600">{{ $message }}</p>@enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">City</label>
                    <input type="text" name="city" value="{{ old('city') }}" required class="mt-1 w-full border rounded-lg p-2">
                    @error('city')<p class="text-sm text-red-600">{{ $message }}</p>@enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Area (optional)</label>
                    <input type="text" name="area" value="{{ old('area') }}" class="mt-1 w-full border rounded-lg p-2">
                    @error('area')<p class="text-sm text-red-600">{{ $message }}</p>@enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Rent</label>
                    <input type="number" step="0.01" name="rent" value="{{ old('rent') }}" required class="mt-1 w-full border rounded-lg p-2">
                    @error('rent')<p class="text-sm text-red-600">{{ $message }}</p>@enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Service Charge (optional)</label>
                    <input type="number" step="0.01" name="service_charge" value="{{ old('service_charge') }}" class="mt-1 w-full border rounded-lg p-2">
                    @error('service_charge')<p class="text-sm text-red-600">{{ $message }}</p>@enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Number of Rooms</label>
                    <input type="number" name="number_of_rooms" value="{{ old('number_of_rooms') }}" required class="mt-1 w-full border rounded-lg p-2">
                    @error('number_of_rooms')<p class="text-sm text-red-600">{{ $message }}</p>@enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Number of Washrooms</label>
                    <input type="number" name="number_of_washrooms" value="{{ old('number_of_washrooms') }}" required class="mt-1 w-full border rounded-lg p-2">
                    @error('number_of_washrooms')<p class="text-sm text-red-600">{{ $message }}</p>@enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Floor Number</label>
                    <input type="number" name="floor_number" value="{{ old('floor_number') }}" required class="mt-1 w-full border rounded-lg p-2">
                    @error('floor_number')<p class="text-sm text-red-600">{{ $message }}</p>@enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Balcony</label>
                    <input type="number" name="balcony" value="{{ old('balcony') }}" required class="mt-1 w-full border rounded-lg p-2">
                    @error('balcony')<p class="text-sm text-red-600">{{ $message }}</p>@enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Gas System</label>
                    <select name="gas_system" required class="mt-1 w-full border rounded-lg p-2 bg-white">
                        <option value="" disabled {{ old('gas_system') ? '' : 'selected' }}>Select gas system</option>
                        <option value="Line" {{ old('gas_system') === 'Line' ? 'selected' : '' }}>Line</option>
                        <option value="Cylinder" {{ old('gas_system') === 'Cylinder' ? 'selected' : '' }}>Cylinder</option>
                    </select>
                    @error('gas_system')<p class="text-sm text-red-600">{{ $message }}</p>@enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Electricity</label>
                    <select name="electricity" required class="mt-1 w-full border rounded-lg p-2 bg-white">
                        <option value="" disabled {{ old('electricity') ? '' : 'selected' }}>Select electricity type</option>
                        <option value="Prepaid" {{ old('electricity') === 'Prepaid' ? 'selected' : '' }}>Prepaid</option>
                        <option value="Postpaid" {{ old('electricity') === 'Postpaid' ? 'selected' : '' }}>Postpaid</option>
                    </select>
                    @error('electricity')<p class="text-sm text-red-600">{{ $message }}</p>@enderror
                </div>

                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700">Description (optional)</label>
                    <textarea name="description" rows="4" class="mt-1 w-full border rounded-lg p-2">{{ old('description') }}</textarea>
                    @error('description')<p class="text-sm text-red-600">{{ $message }}</p>@enderror
                </div>

                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700">Image (optional)</label>
                    <input type="file" name="image" accept="image/*" class="mt-1 w-full border rounded-lg p-2">
                    @error('image')<p class="text-sm text-red-600">{{ $message }}</p>@enderror
                </div>

                <div class="md:col-span-2">
                    <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded">Save Property</button>
                </div>
            </form>
        </div>
    </main>
</body>
</html>


