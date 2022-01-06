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
                <form action="{{ route('crate-property') }}" method="POST" class="p-6 bg-white border-b border-gray-200"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="flex -mx-4 mb-2">
                        <div class="flex-1 px-2">
                            <label for="name">Name</label>
                            <input class="fibonacci-input" type="text" name="name" id="name" value="{{old('name')}}">
                            @error('name')
                            <div class=" text-red-600">{{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="flex-1 px-2">
                            <label for="name_tr">Name - Turkish</label>
                            <input class="fibonacci-input" type="text" name="name_tr" id="name_tr"
                                value="{{old('name_tr')}}">
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
                                value="{{old('price')}}">
                            @error('price')
                            <div class=" text-red-600">{{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="flex-1 px-2">
                            <label for="featured_image">Feature Image</label>
                            <input class="fibonacci-input" type="file" id="featured_image" name="featured_image"
                                required>
                            @error('featured_image')
                            <div class=" text-red-600">{{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="flex-1 px-2">
                            <label for="gallery_images">Gallery Images</label>
                            <input class="fibonacci-input" type="file" id="gallery_images" name="gallery_images[]"
                                multiple>
                            @error('gallery_images')
                            <div class=" text-red-600">{{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="flex -mx-4 mb-2">
                        <div class="flex-1 px-2">
                            <label for="location_id">Location</label>
                            <select class="fibonacci-input" name="location_id" id="location_id">
                                <option value="">Select Location</option>
                                @foreach ($locations as $location)
                                <option {{old('location_id')==$location->id ? 'selected="selected"' : ''}} value="{{
                                    $location->id }}">{{ $location->name }}</option>
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
                                <option {{old('saleOrRent')=='0' ? 'selected="selected"' : '' }} value="0">Rent</option>
                                <option {{old('saleOrRent')=='1' ? 'selected="selected"' : '' }} value="1">Sale</option>
                            </select>
                            @error('saleOrRent')
                            <div class="text-red-600">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="flex-1 px-2">
                            <label for="type">Type</label>
                            <select class="fibonacci-input" name="type" id="type">
                                <option value="">Select Type</option>
                                <option {{old('type')=='0' ? 'selected="selected"' : '' }} value="0">Land</option>
                                <option {{old('type')=='1' ? 'selected="selected"' : '' }} value="1">Apartment</option>
                                <option {{old('type')=='2' ? 'selected="selected"' : '' }} value="2">Villa</option>
                            </select>
                            @error('type')
                            <div class="text-red-600">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="flex-1 px-2">
                            <label for="bedrooms">Bedrooms</label>
                            <select class="fibonacci-input" name="bedrooms" id="bedrooms">
                                <option value="">Select Bedrooms</option>
                                <option {{old('bedrooms')=='1' ? 'selected="selected"' : '' }} value="1">1</option>
                                <option {{old('bedrooms')=='2' ? 'selected="selected"' : '' }} value="2">2</option>
                                <option {{old('bedrooms')=='3' ? 'selected="selected"' : '' }} value="3">3</option>
                                <option {{old('bedrooms')=='4' ? 'selected="selected"' : '' }} value="4">4</option>
                                <option {{old('bedrooms')=='5' ? 'selected="selected"' : '' }} value="5">5</option>
                            </select>
                            @error('bedrooms')
                            <div class="text-red-600">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="flex-1 px-2">
                            <label for="bathrooms">bathrooms</label>
                            <select class="fibonacci-input" name="bathrooms" id="bathrooms">
                                <option value="">Select Bathrooms</option>
                                <option {{old('bathrooms')=='1' ? 'selected="selected"' : '' }} value="1">1</option>
                                <option {{old('bathrooms')=='2' ? 'selected="selected"' : '' }} value="2">2</option>
                                <option {{old('bathrooms')=='3' ? 'selected="selected"' : '' }} value="3">3</option>
                                <option {{old('bathrooms')=='4' ? 'selected="selected"' : '' }} value="4">4</option>
                                <option {{old('bathrooms')=='5' ? 'selected="selected"' : '' }} value="5">5</option>
                            </select>
                            @error('bathrooms')
                            <div class="text-red-600">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="flex -mx-4 mb-2">
                        <div class="flex-1 px-2">
                            <label for="overview">Overview</label>
                            <textarea class="fibonacci-input" name="overview" id="overview" cols="30"
                                rows="5">{{old('overview')}}</textarea>
                            @error('overview')
                            <div class="text-red-600">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="flex-1 px-2">
                            <label for="overview_tr">Overview - Turkish</label>
                            <textarea class="fibonacci-input" name="overview_tr" id="overview_tr" cols="30"
                                rows="5">{{old('overview_tr')}}</textarea>
                            @error('overview_tr')
                            <div class="text-red-600">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="flex -mx-4 mb-2">
                        <div class="flex-1 px-2">
                            <label for="why_buy">Why Buy</label>
                            <input class="fibonacci-input" type="text" name="why_buy" id="why_buy value="
                                {{old('why_buy')}}">
                            @error('why_buy')
                            <div class="text-red-600">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="flex -mx-4 mb-2">
                        <div class="flex-1 px-2">
                            <label for="description">Description</label>
                            <textarea class="fibonacci-input" name="description" id="description" cols="30"
                                rows="10">{{old('description')}}</textarea>
                            @error('description')
                            <div class="text-red-600">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="flex-1 px-2">
                            <label for="description_tr">Description - Turkish</label>
                            <textarea class="fibonacci-input" name="description_tr" id="description_tr" cols="30"
                                rows="10">{{old('description_tr')}}</textarea>
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