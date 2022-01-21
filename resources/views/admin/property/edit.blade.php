<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-items-start">
            <div class="min-w-max">
                <a href="{{ route('dashboard-properties') }}" class="bg-gray-100 border py-2 px-4">🠔</a>
            </div>

            <h2 class="font-semibold text-xl text-gray-800 leading-tight ml-3">
                {{ __('Edit Property') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <form action="{{ route('crate-property') }}" method="POST" class="p-6 bg-white border-b border-gray-200"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="flex -mx-4 mb-2">
                        <div class="flex-1 px-2">
                            <label for="name">Name</label>
                            <input class="fibonacci-input" type="text" name="name" id="name"
                                value="{{ $property->name }}" required>
                            @error('name')
                            <div class=" text-red-600">{{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="flex-1 px-2">
                            <label for="name_tr">Name - Turkish</label>
                            <input class="fibonacci-input" type="text" name="name_tr" id="name_tr"
                                value="{{ $property->name_tr }}" required>
                            @error('name_tr')
                            <div class=" text-red-600">{{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="flex -mx-4 mb-2">
                        <div class="flex-1 px-2">
                            <label for="price">Price</label>
                            <input class="fibonacci-input" type="number" name="price" id="price"
                                value="{{ $property->price }}" required>
                            @error('price')
                            <div class=" text-red-600">{{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="flex-1 px-2">
                            <label for="featured_image">Feature Image</label>
                            <input class="fibonacci-input" type="file" id="featured_image" name="featured_image">

                            <div class="mt-3">
                                <img src="/uploads/{{$property->featured_image}}" alt="">
                            </div>
                            @error('featured_image')
                            <div class=" text-red-600">{{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="flex-1 px-2">
                            <label for="gallery_images">Gallery Images</label>
                            <input class="fibonacci-input" type="file" id="gallery_images" name="gallery_images[]"
                                multiple>

                            <p class="mt-3">
                                <img src="/uploads/{{ $property->gallery_images }}" alt="">
                            </p>
                            @error('gallery_images')
                            <div class=" text-red-600">{{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="flex -mx-4 mb-2">
                        <div class="flex-1 px-2">
                            <label for="location_id">Location</label>
                            <select class="fibonacci-input" name="location_id" id="location_id" required>
                                <option value="">Select Location</option>
                                @foreach ($locations as $location)
                                <option {{ $property->location->id == $location->id ? 'selected="selected"' : ''
                                    }} value="{{ $location->id }}">{{ $location->name }}</option>
                                @endforeach
                            </select>
                            @error('location_id')
                            <div class="text-red-600">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="flex-1 px-2">
                            <label for="saleOrRent">For</label>
                            <select class="fibonacci-input" name="saleOrRent" id="saleOrRent">
                                <option value="">Select</option>
                                <option {{ $property->saleOrRent == "0" ? 'selected="selected"' : '' }} value="0">Rent
                                </option>
                                <option {{ $property->saleOrRent == "1" ? 'selected="selected"' : '' }} value="1">Sale
                                </option>
                            </select>
                            @error('saleOrRent')
                            <div class="text-red-600">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="flex-1 px-2">
                            <label for="type">Type</label>
                            <select class="fibonacci-input" name="type" id="type">
                                <option value="">Select Type</option>
                                <option {{ $property->type == "0" ? 'selected="selected"' : '' }} value="0">Land
                                </option>
                                <option {{ $property->type == "1" ? 'selected="selected"' : '' }} value="1">Apartment
                                </option>
                                <option {{ $property->type == "2" ? 'selected="selected"' : '' }} value="2">Villa
                                </option>
                            </select>
                            @error('type')
                            <div class="text-red-600">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="flex-1 px-2">
                            <label for="bedrooms">Bedrooms</label>
                            <select class="fibonacci-input" name="bedrooms" id="bedrooms">
                                <option value="">Select Bedrooms</option>
                                <option {{ $property->bedrooms == "1" ? 'selected="selected"' : '' }} value="1">1
                                </option>
                                <option {{ $property->bedrooms == "2" ? 'selected="selected"' : '' }} value="2">2
                                </option>
                                <option {{ $property->bedrooms == "3" ? 'selected="selected"' : '' }} value="3">3
                                </option>
                                <option {{ $property->bedrooms == "4" ? 'selected="selected"' : '' }} value="4">4
                                </option>
                                <option {{ $property->bedrooms == "5" ? 'selected="selected"' : '' }} value="5">5
                                </option>
                            </select>
                            @error('bedrooms')
                            <div class="text-red-600">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="flex-1 px-2">
                            <label for="bathrooms">bathrooms</label>
                            <select class="fibonacci-input" name="bathrooms" id="bathrooms">
                                <option value="">Select Bathrooms</option>
                                <option {{ $property->bathrooms == "1" ? 'selected="selected"' : '' }} value="1">1
                                </option>
                                <option {{ $property->bathrooms == "2" ? 'selected="selected"' : '' }} value="2">2
                                </option>
                                <option {{ $property->bathrooms == "3" ? 'selected="selected"' : '' }} value="3">3
                                </option>
                                <option {{ $property->bathrooms == "4" ? 'selected="selected"' : '' }} value="4">4
                                </option>
                                <option {{ $property->bathrooms == "5" ? 'selected="selected"' : '' }} value="5">5
                                </option>
                            </select>
                            @error('bathrooms')
                            <div class="text-red-600">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="flex -mx-4 mb-2">
                        <div class="flex-1 px-2">
                            <label for="overview">Overview</label>
                            <textarea class="fibonacci-input" name="overview" id="overview" cols="30" rows="5"
                                required>{{ $property->overview }}</textarea>
                            @error('overview')
                            <div class="text-red-600">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="flex-1 px-2">
                            <label for="overview_tr">Overview - Turkish</label>
                            <textarea class="fibonacci-input" name="overview_tr" id="overview_tr" cols="30" rows="5"
                                required>{{ $property->overview_tr }}</textarea>
                            @error('overview_tr')
                            <div class="text-red-600">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="flex -mx-4 mb-2">
                        <div class="flex-1 px-2">
                            <label for="why_buy">Why Buy</label>
                            <input class="fibonacci-input" type="text" name="why_buy" id="why_buy value=" {{
                                $property->why_buy }}">
                            @error('why_buy')
                            <div class="text-red-600">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="flex -mx-4 mb-2">
                        <div class="flex-1 px-2">
                            <label for="description">Description</label>
                            <textarea class="fibonacci-input" name="description" id="description" cols="30" rows="10"
                                required>{{ $property->description }}</textarea>
                            @error('description')
                            <div class="text-red-600">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="flex-1 px-2">
                            <label for="description_tr">Description - Turkish</label>
                            <textarea class="fibonacci-input" name="description_tr" id="description_tr" cols="30"
                                rows="10" required>{{ $property->description_tr }}</textarea>
                            @error('description_tr')
                            <div class="text-red-600">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <button class="btn" type="submit">Publish</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>