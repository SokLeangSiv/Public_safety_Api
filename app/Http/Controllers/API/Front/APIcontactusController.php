<?php

namespace App\Http\Controllers\API\Front ;

use Illuminate\Http\Request;
use App\Models\Contactus;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller as Controller;

class APIContactUsController extends Controller
{
    public function showContact()
    {
        return response()->json([
            'message' => 'This is the contact page',
             
        ]);
    }

    public function showAbout()
    {
        return response()->json([
            'message' => 'This is the about us page',
        ]);
    }

    public function storeContact(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'subject' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
        ]);

        $contactus = Contactus::create($validatedData);

        return response()->json([
            'message' => 'Contact information stored successfully.',
            'data' => $contactus
        ], 201);
    }
}
