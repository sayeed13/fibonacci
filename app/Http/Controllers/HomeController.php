<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        $latestProperties = Property::orderBy('created_at', 'desc')->take(4)->get();
        return view('welcome', [
            'latestProperties' => $latestProperties
        ]);
    }
}
