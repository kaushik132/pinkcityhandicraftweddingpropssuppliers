<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Seo;

class PageController extends Controller
{
    public function about()
    {
        $homepage = Seo::latest()->first();

    $seo_data['seo_title'] = $homepage->seo_title_about ?? 'About Us — Pink City';
    $seo_data['seo_description'] = $homepage->seo_des_about ?? '';
    $seo_data['keywords'] = $homepage->seo_key_about ?? '';
    $canocial = url('/about');
         return view('about', compact('seo_data', 'canocial'));
    }


public function contact()
{
    $homepage = Seo::latest()->first();

    $seo_data['seo_title'] = $homepage->seo_title_contact ?? 'Contact Us — Pink City';
    $seo_data['seo_description'] = $homepage->seo_des_contact ?? '';
    $seo_data['keywords'] = $homepage->seo_key_contact ?? '';
    $canocial = url('/contact');

    return view('contact', compact('seo_data', 'canocial'));
}
    public function contactSubmit(Request $request)
    {

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'subject' => 'nullable|string|max:255',
            'message' => 'required|string',
        ]);

        // Save the contact message to the database
        Contact::create($validatedData);


        return redirect()->back()->with('success', 'Thank you for contacting us! We will get back to you soon.');
    }
}
