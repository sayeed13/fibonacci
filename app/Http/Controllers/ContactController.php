<?php

namespace App\Http\Controllers;

use App\Mail\contactMail;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function propertyInquiry(Request $request, $property_id)
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|max:255',
            'message' => 'required'
        ]);

        $contact = new Contact();
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->message = $request->message . '\n This Message sent form ' . route('single-property', $property_id) . ' ';
        $contact->save();

        Mail::send(new contactMail($contact));

        return redirect(route('single-property', $property_id))->with('message', 'Your Request sent successfully!');;
    }
}
