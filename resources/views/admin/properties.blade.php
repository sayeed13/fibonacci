<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Properties') }}
            </h2>

            <div class="min-w-max">
                <a href="{{ route('add-property') }}" class="fullwidth-btn">Add New Property</a>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <table class="w-full table-auto mb-6">
                        <thead>
                            <tr>
                                <th class="border px-4 py-2">Name</th>
                                <th class="border px-4 py-2">Location</th>
                                <th class="border px-4 py-2">Price</th>
                                <th class="border px-4 py-2">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($properties as $property)
                            <tr>
                                <td class="border py-2 px-4">{{ $property->name }}</td>
                                <td class="border py-2 px-4">{{ $property->location->name }}</td>
                                <td class="border py-2 px-4">{{ $property->price }}</td>
                                <td class="border py-2 px-4 text-center">
                                    <a class="bg-blue-500 px-4 py-2 text-white rounded text-xs"
                                        href="{{ route('edit-property', $property->id) }}">Edit</a>
                                    <a class="bg-yellow-200 px-4 py-2 text-black rounded text-xs"
                                        href="{{ route('single-property', $property->id) }}" target="_blank">View</a>
                                    <a class="bg-red-500 px-4 py-2 text-white rounded text-xs" href="">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $properties->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>