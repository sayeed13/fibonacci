<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-items-start">
            <div class="min-w-max">
                <a href="{{ route('dashboard-properties') }}" class="bg-gray-100 border py-2 px-4">🠔</a>
            </div>

            <h2 class="font-semibold text-xl text-gray-800 leading-tight ml-3">
                {{ __('Add New Property') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <form target="{{ route('crate-property') }}" method="POST"
                    class="p-6 bg-white border-b border-gray-200">
                    @csrf
                    <div class="flex -mx-4 mb-2">
                        <div class="flex-1 px-2">
                            <label for="name">Name</label>
                            <input class="fibonacci-input" type="text" id="name">
                        </div>
                        <div class="flex-1 px-2">
                            <label for="name_tr">Name - Turkish</label>
                            <input class="fibonacci-input" type="text" id="name_tr">
                        </div>
                    </div>
                    <div class="flex -mx-4 mb-2">
                        <div class="flex-1 px-2">
                            <label for="price">Price</label>
                            <input class="fibonacci-input" type="number" id="price">
                        </div>
                        <div class="flex-1 px-2">
                            <label for="featured_image">Feature Image</label>
                            <input class="fibonacci-input" type="file" id="featured_image">
                        </div>
                    </div>
                    <div class="flex -mx-4 mb-2">
                        <div class="flex-1 px-2">
                            <label for="location_id">Location</label>
                            <select class="fibonacci-input" name="location_id" id="location_id">
                                <option value="">Select Location</option>
                            </select>
                        </div>
                        <div class="flex-1 px-2">
                            <label for="saleOrRent">For</label>
                            <select class="fibonacci-input" name="saleOrRent" id="saleOrRent">
                                <option value="">Select</option>
                                <option value="0">Rent</option>
                                <option value="1">Sale</option>
                            </select>
                        </div>
                        <div class="flex-1 px-2">
                            <label for="type">Type</label>
                            <select class="fibonacci-input" name="type" id="type">
                                <option value="">Select Type</option>
                                <option value="0">Land</option>
                                <option value="1">Apartment</option>
                                <option value="2">Villa</option>
                            </select>
                        </div>
                        <div class="flex-1 px-2">
                            <label for="bedrooms">Bedrooms</label>
                            <select class="fibonacci-input" name="bedrooms" id="bedrooms">
                                <option value="">Select Bedrooms</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                        </div>
                        <div class="flex-1 px-2">
                            <label for="bathrooms">bathrooms</label>
                            <select class="fibonacci-input" name="bathrooms" id="bathrooms">
                                <option value="">Select Bathrooms</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                        </div>
                    </div>
                    <div class="flex -mx-4 mb-2">
                        <div class="flex-1 px-2">
                            <label for="overview">Overview</label>
                            <textarea class="fibonacci-input" name="overview" id="overview" cols="30"
                                rows="5"></textarea>
                        </div>
                        <div class="flex-1 px-2">
                            <label for="overview_tr">Overview - Turkish</label>
                            <textarea class="fibonacci-input" name="overview_tr" id="overview_tr" cols="30"
                                rows="5"></textarea>
                        </div>
                    </div>
                    <div class="flex -mx-4 mb-2">
                        <div class="flex-1 px-2">
                            <label for="why_buy">Why Buy</label>
                            <input class="fibonacci-input" type="text" name="why_buy" id="why_buy">
                        </div>
                    </div>
                    <div class="flex -mx-4 mb-2">
                        <div class="flex-1 px-2">
                            <label for="description">Description</label>
                            <textarea class="fibonacci-input" name="description" id="description" cols="30"
                                rows="10"></textarea>
                        </div>
                        <div class="flex-1 px-2">
                            <label for="description_tr">Description - Turkish</label>
                            <textarea class="fibonacci-input" name="description_tr" id="description_tr" cols="30"
                                rows="10"></textarea>
                        </div>
                    </div>
                    <div class="flex -mx-4 mb-2 px-2">
                        <input class="btn" type="submit" name="Save" placeholder="Save">
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>