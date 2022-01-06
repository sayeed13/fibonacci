<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Models\Media;
use App\Models\Property;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }

    public function properties()
    {
        $properties = Property::latest()->paginate(20);
        return view('admin.properties', ['properties' => $properties]);
    }

    public function addProperty()
    {
        $locations = Location::all();
        return view('admin.property.add', ['locations' => $locations]);
    }

    public function createProperty(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'name_tr' => 'required',
            'overview' => 'required',
            'overview_tr' => 'required',
            'why_buy' => 'required',
            'description' => 'required',
            'description_tr' => 'required',
            'price' => 'required',
            'location_id' => 'required',
            'featured_image' => 'required|image',
            'gallery_images' => 'required',
            'bathrooms' => 'integer',
            'bedrooms' => 'integer',
            'saleOrRent' => 'integer',
            'type' => 'integer',
        ]);

        $property = new Property();
        $property->name = $request->name;
        $property->name_tr = $request->name_tr;
        $property->overview = $request->overview;
        $property->overview_tr = $request->overview_tr;
        $property->why_buy = $request->why_buy;
        $property->description = $request->description;
        $property->description_tr = $request->description_tr;
        $property->price = $request->price;

        // Set File Name
        $featured_single_image = time() . '-' . $request->featured_image->getClientOriginalName();

        //Store File
        $request->featured_image->storeAs('public/uploads', $featured_single_image);

        // Use File
        $property->featured_image = $featured_single_image;


        $property->location_id = $request->location_id;
        $property->bathrooms = $request->bathrooms;
        $property->bedrooms = $request->bedrooms;
        $property->saleOrRent = $request->saleOrRent;
        $property->type = $request->type;
        $property->save();

        //multiple File Store
        foreach ($request->gallery_images as $image) {
            $gallery_image_name = time() . '-' . $image->getClientOriginalName();
            $image->storeAs('public/uploads', $gallery_image_name);
            $media = new Media();
            $media->name = $gallery_image_name;

            $media->property_id = $property->id;
            $media->save();
        }

        return redirect(route('dashboard-properties'))->with('message', 'Your Property has been publish successfully!');;
    }


    public function editProperty($id)
    {
        $property = Property::findOrFail($id);
        $locations = Location::all();

        return view('admin.property.edit', [
            'property' => $property,
            'locations' => $locations
        ]);
    }
}
