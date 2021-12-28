<x-guest-layout>
    {{-- Breadcrumb --}}
    <div class="shadow-md border-2 border-gray-300 py-2 bg-white mt-28">
        <div class="container mx-auto">
            <ul class="flex items-center">
                <li>{{ $page->name }}</li>
            </ul>
        </div>
    </div>


    {{ $page }}


</x-guest-layout>