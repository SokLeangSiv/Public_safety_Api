<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contactus;

class ContactUsController extends Controller
{
    public function showContact(){
        return view('contactus.contact_us');
    }

    public function showAbout(){
        return view('aboutus.about_us');
    }

    public function storeContact(Request $request){

        $request->validate([

            'name' => 'required',
            'subject' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
        ]);


        Contactus::create($request->all());

        return redirect()->route('show.contact.us');
    }
}
