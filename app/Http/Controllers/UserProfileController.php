<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserProfileController extends Controller
{

    public function showProfile()
    {
        // Get the currently authenticated user

        return view('userProfile.profile');
    }



    public function storeProfile(Request $request)
{
    // Validate the request data of user profile
    $this->validate($request, [
        'name' => 'required',
        'password' => 'required',
        'image' => 'nullable|image|max:2048', // Add validation for image
    ]);

    // Create a new user profile object
    $user = User::find(auth()->user()->id);

    // Assign values to the user object
    $user->name = $request->name;
    $user->password = Hash::make($request->password); // Hash the password for security

    // Image handling
    if ($request->hasFile('image')) {
        $image = $request->file('image');

        // Get the original file name
        $name = $image->getClientOriginalName();

        // Generate a unique file name to prevent overwriting
        $fileName = uniqid() . '_' . $name;

        // Get the destination path
        $destinationPath = public_path('/user/images');

        // Delete the old image if it exists
        if ($user->image) {
            $oldImagePath = $destinationPath . '/' . $user->image;
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }
        }

        // Move the new image to the destination path
        $image->move($destinationPath, $fileName);

        // Store the new file name in the database
        $user->image = $fileName;
    }

    // Save the user object
    $user->save();

    // Redirect to the user profile page with a success message
    return redirect()->back()->with('success', 'Profile updated successfully');
}
    public function logout(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
