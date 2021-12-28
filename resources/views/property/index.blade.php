<x-guest-layout>
    {{-- Breadcrumb --}}
    <div class="shadow-md border-2 border-gray-300 py-2 bg-white mt-28">
        <div class="container mx-auto">
            <ul class="flex items-center">
                <li><a class="text-base text-red-800" href="{{ route('home') }}">Home</a></li>
                <li class="mx-3"><i class="fa fa-angle-right"></i></li>
                <li>All Properties</li>
            </ul>
        </div>
    </div>

    <div class="bg-white py-8">
        <div class="container mx-auto">
            <h2 class="text-2xl text-gray-600">Properties
                @if (request('type') == 0)
                - Land
                @elseif (request('type') == 1)
                - Apartment
                @elseif (request('type') == 2)
                - Villa
                @endif
            </h2>
        </div>
    </div>

    <!-- Content -->
    <div class="container mx-auto py-10">
        <div class="flex justify-between">

            {{-- Left Content --}}
            <div class="w-9/12">
                <div class="grid grid-cols-3 justify-between mb-10">
                    @foreach ($properties as $property)
                    @include('components.property-card', ['property' => $property])
                    @endforeach
                </div>
                {{ $properties->links() }}
            </div>{{-- Left Content End --}}



            {{-- Sidebar --}}
            <div class="w-3/12 ml-6 vertical-search-form">
                @include('components.search-form', ['locations', $locations])
            </div>


        </div>

    </div>
</x-guest-layout>