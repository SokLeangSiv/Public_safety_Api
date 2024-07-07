<?php

namespace App\Http\Controllers\API\Back;

use Illuminate\Http\Request;
use App\Models\Contactus;
use App\Http\Controllers\Controller as Controller;
use Illuminate\Support\Facades\DB;



class APIbackcontactusController extends Controller
{
   
    public function showForm()
    {
        return response()->json([
            'message' => 'Form has shown successfully',
        ], 200);
    }

    // Save contact information
    public function saveContact(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:contact_us,email',
            'phone' => 'required',
            'subject' => 'required',
        ]);

        $contact = Contactus::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'subject' => $request->subject,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Feedback submitted successfully!',
            'data' => $contact
        ], 201);
    }

    // Get all contact information
    public function ContactUs_table()
    {
        $contacts = DB::table('contact_us')->get();

        if ($contacts->isEmpty()) {
            return response()->json([
                'message' => 'No contacts found'
            ], 404); 
        }


        return response()->json($contacts);
    }

    public function viewContact($id)
    {
        $contact = Contactus::find($id);

        if (!$contact) {
            return response()->json(['success' => false, 'message' => 'Contact not found'], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $contact
        ], 200);
    }

    public function editContact()
    {
        return response()->json([
            'message' => 'Contact has been shown',
        ], 200);
    }

    // Update specific contact information
    public function updateContact(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|max:20',
            'subject' => 'required|max:255',
        ]);

        $contact = Contactus::findOrFail($id);

        $contact->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'subject' => $request->subject,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Contact updated successfully.',
            'data' => $contact
        ], 200);
    }

    // Delete specific contact information
    public function deleteContact($id)
    {
        $contact = Contactus::find($id);

        if (!$contact) {
            return response()->json(['success' => false, 'message' => 'Contact not found'], 404);
        }

        $contact->delete();

        return response()->json(['success' => true, 'message' => 'Contact deleted successfully.'], 200);
    }

    public function searchContact(Request $request)
    {
        $search = $request->input('search');

        $contacts = Contactus::where('name', 'like', '%' . $search . '%')
            ->orWhere('email', 'like', '%' . $search . '%')
            ->orWhere('phone', 'like', '%' . $search . '%')
            ->paginate(10);

        return response()->json($contacts);
    }

}
