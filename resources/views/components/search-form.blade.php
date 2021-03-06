<form action="{{ route('properties') }}" method="GET" class="flex justify-between">
    <div class="flex w-8/12 justify-between items-center">
        <div class="flex flex-col mx-3">
            <select name="saleOrRent" class="border-0 focus:ring-0">
                <option value="">Buy or Rent</option>
                <option {{ request('saleOrRent')=='1' ? 'selected="selected"' : '' }} value="1">Buy</option>
                <option {{ request('saleOrRent')=='0' ? 'selected="selected"' : '' }} value="0">Rent</option>
            </select>
        </div>
        <div class="py-3 self-center border-gray-500 border"></div>
        <div class="flex flex-col mx-3">
            <select name="location" class="border-0 focus:ring-0">
                <option value="">Locations</option>
                @foreach ($locations as $location)
                <option {{ request('location')==$location->id ? 'selected="selected"' : '' }} value="{{
                    $location->id }}">{{ $location->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="py-3 self-center border-gray-500 border"></div>
        <div class="flex flex-col mx-3">
            <select name="type" class="border-0 focus:ring-0">
                <option value="">Type</option>
                <option {{ request('type')=='0' ? 'selected="selected"' : '' }} value="0">Land</option>
                <option {{ request('type')=='1' ? 'selected="selected"' : '' }} value="1">Apartment</option>
                <option {{ request('type')=='2' ? 'selected="selected"' : '' }} value="2">Villa</option>
            </select>
        </div>
        <div class="py-3 self-center border-gray-500 border"></div>
        <div class="flex flex-col mx-3 w-24">
            <select name="price" class="border-0 focus:ring-0">
                <option value="">Price</option>
                <option {{ request('price')=='100000' ? 'selected="selected"' : '' }} value="100000">0 - 100000</option>
                <option {{ request('price')=='200000' ? 'selected="selected"' : '' }} value="200000">100000 - 200000
                </option>
                <option {{ request('price')=='300000' ? 'selected="selected"' : '' }} value="300000">200000 - 300000
                </option>
                <option {{ request('price')=='400000' ? 'selected="selected"' : '' }} value="400000">300000 - 400000
                </option>
                <option {{ request('price')=='500000' ? 'selected="selected"' : '' }} value="500000">400000 - 500000
                </option>
                <option {{ request('price')=='500000+' ? 'selected="selected"' : '' }} value="500000+">500000+</option>
            </select>
        </div>
        <div class="py-3 self-center border-gray-500 border"></div>
        <div class="flex flex-col mx-3">
            <select name="bedrooms" class="border-0 focus:ring-0">
                <option value="">Bedrooms</option>
                <option {{ request('bedrooms')=='1' ? 'selected="selected"' : '' }} value="1">1</option>
                <option {{ request('bedrooms')=='2' ? 'selected="selected"' : '' }} value="2">2</option>
                <option {{ request('bedrooms')=='3' ? 'selected="selected"' : '' }} value="3">3</option>
                <option {{ request('bedrooms')=='4' ? 'selected="selected"' : '' }} value="4">4</option>
                <option {{ request('bedrooms')=='5' ? 'selected="selected"' : '' }} value="5">5</option>
            </select>
        </div>
    </div>
    <div class="flex justify-between items-center w-4/12 ml-5">
        <input name="searchText" value="{{ request('searchText') }}" type="search"
            placeholder="Try to search for something"
            class="rounded-lg px-4 py-2 w-full mr-4 focus:border-gray-700 focus:ring-0">
        <button type="submit" class="btn">Search</button>
    </div>
</form>