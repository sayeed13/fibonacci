<?php

namespace App\Http\Controllers;

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
        if (!empty($request->saleOrRent)) {
            $Properties = $Properties->where('saleOrRent', $request->saleOrRent);
        }
        if (!empty($request->bedrooms)) {
            $Properties = $Properties->where('bedrooms', $request->bedrooms);
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
        if (!empty($request->type)) {
            $Properties = $Properties->where('type', $request->type);
        }
        $Properties = $Properties->paginate(12);

        return view('property.index', ['properties' => $Properties]);
    }
}
