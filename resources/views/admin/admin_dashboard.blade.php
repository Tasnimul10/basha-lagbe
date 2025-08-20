<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-gray-50">
    <header class="bg-white shadow p-4 flex justify-between items-center">
        <h1 class="text-xl font-bold">Admin Dashboard</h1>
        <form method="POST" action="{{ route('admin.logout') }}">
            @csrf
            <button class="bg-red-600 text-white py-1 px-3 rounded">Logout</button>
        </form>
    </header>

    <main class="p-6">
        <div class="bg-white p-6 rounded-lg shadow">
            <h2 class="text-lg font-semibold mb-4">Property Management</h2>
            
            @if(session('status'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                    {{ session('status') }}
                </div>
            @endif

            <div class="overflow-x-auto">
                <table class="min-w-full bg-white border border-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Landlord</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Location</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">City</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Rent</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse($properties as $property)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $property->id }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $property->landlord->name ?? 'N/A' }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $property->location }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $property->city }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">৳{{ number_format($property->rent, 2) }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                        @if($property->status === 'approved') bg-green-100 text-green-800
                                        @elseif($property->status === 'rejected') bg-red-100 text-red-800
                                        @else bg-yellow-100 text-yellow-800 @endif">
                                        {{ ucfirst($property->status) }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <form method="POST" action="{{ route('admin.properties.update-status', $property) }}" class="inline">
                                        @csrf
                                        @method('PATCH')
                                        <select name="status" onchange="this.form.submit()" class="text-sm border rounded px-2 py-1">
                                            <option value="pending" {{ $property->status === 'pending' ? 'selected' : '' }}>Pending</option>
                                            <option value="approved" {{ $property->status === 'approved' ? 'selected' : '' }}>Approved</option>
                                            <option value="rejected" {{ $property->status === 'rejected' ? 'selected' : '' }}>Rejected</option>
                                        </select>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="px-6 py-4 text-center text-sm text-gray-500">No properties found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </main>
</body>
</html>
