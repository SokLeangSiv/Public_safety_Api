<?php

namespace App\Http\Controllers\API\Back;

use App\Models\BackUser;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class APIproController extends Controller
{
    public function editProfile()
    {
        $user = BackUser::find(Auth::user()->id);

        if ($user) {
            return response()->json([
                'success' => true,
                'data' => $user
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'User not found'
            ], 404);
        }
    }

    public function updateProfile(Request $request)
    {
        $user = BackUser::find(Auth::user()->id);

        if ($user) {
            $user->name = $request->name;
            $user->email = $request->email;

            if ($request->filled('password')) {
                $user->password = bcrypt($request->password);
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

    public function updateProfilePicture(Request $request)
    {
        $user = BackUser::find(Auth::user()->id);

        if ($user) {
            if ($request->hasFile('profile')) {
                $file = $request->file('profile');
                $fileName = uniqid() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('Profile_Picture'), $fileName);

                // Remove the old profile picture if it exists
                if ($user->profile_picture) {
                    $oldFilePath = public_path('Profile_Picture') . '/' . $user->profile_picture;
                    if (file_exists($oldFilePath)) {
                        unlink($oldFilePath);
                    }
                }
                $user->profile_picture = $fileName;
            }
            $user->save();

            return response()->json([
                'success' => true,
                'message' => 'Profile picture updated successfully',
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