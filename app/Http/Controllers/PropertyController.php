<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Models\Property;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    public function single($id)
    {
        $property = Property::findOrFail($id);

        return view('property.single', ['property' => $property]);
    }

    public function index(Request $request)
    {
        $Properties = Property::latest();
        $locations = Location::select('id', 'name')->get();
        if (!empty($request->saleOrRent)) {
            $Properties = $Properties->where('saleOrRent', $request->saleOrRent);
        }
        if (!empty($request->bedrooms)) {
            $Properties = $Properties->where('bedrooms', $request->bedrooms);
        }
        if (!empty($request->location)) {
            $Properties = $Properties->where('location_id', $request->location);
        }
        if (!empty($request->price)) {
            //$Properties = $Properties->where('type', $request->type);
            if ($request->price == '100000') {
                $Properties = $Properties->where('price', '<=', 100000);
            }
            if ($request->price == '200000') {
                $Properties = $Properties->where('price', '<=', 200000)->where('price', '>', 100000);
            }
            if ($request->price == '300000') {
                $Properties = $Properties->where('price', '<=', 300000)->where('price', '>', 200000);
            }
            if ($request->price == '400000') {
                $Properties = $Properties->where('price', '<=', 400000)->where('price', '>', 300000);
            }
            if ($request->price == '500000') {
                $Properties = $Properties->where('price', '<=', 500000)->where('price', '>', 400000);
            }
            if ($request->price == '500000+') {
                $Properties = $Properties->where('price', '>', 500000);
            }
        }
        if (!empty($request->searchText)) {
            $Properties = $Properties->where('name', 'LIKE', "%{$request->searchText}%");
        }
        if (!empty($request->type)) {
            $Properties = $Properties->where('type', $request->type);
        }
        $Properties = $Properties->paginate(12);

        return view('property.index', ['properties' => $Properties, 'locations' => $locations]);
    }
}
