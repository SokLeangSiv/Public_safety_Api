<?php

namespace App\Http\Controllers\API\Back;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Routing\Controller;

class APIbackprofileController extends Controller
{
    public function show()
    {
        $user = User::find(Auth::id());

        if ($user) {
            return response()->json([
                'success' => true,
                'data' => $user->image
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'User not found'
            ], 404);
        }
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'password' => 'nullable',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $user = User::find(Auth::id());

        if ($user) {
            $user->name = $request->name;

            if ($request->password) {
                $user->password = Hash::make($request->password);
            }

            // Update image
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $name = time() . '.' . $image->getClientOriginalExtension();
                $destinationPath = public_path('/images');
                $image->move($destinationPath, $name);
                $user->image = $name;
            }

            $user->save();

            return response()->json([
                'success' => true,
                'message' => 'Profile updated successfully',
                'data' => $user
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'User not found'
            ], 404);
        }
    }
}
