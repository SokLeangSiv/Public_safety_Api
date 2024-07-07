<?php

namespace App\Http\Controllers\API\Front;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Exception;
use App\Http\Controllers\Controller as Controller;


class APIuserProfileController extends Controller
{
    
    public function showProfile(Request $request): JsonResponse
    {
        try {
            $user = $request->user();

            return response()->json([
                'status' => 'success',
                'user' => $user
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to retrieve user profile',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    
    public function storeProfile(Request $request): JsonResponse
    {
        try {
            // Validate the request data
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'password' => 'required|string|min:6',
                'image' => 'nullable|image|max:2048', // Add validation for image
            ]);

            // Retrieve the authenticated user
            $user = User::find(auth()->user()->id);

            // Assign values to the user object
            $user->name = $validatedData['name'];
            $user->password = Hash::make($validatedData['password']); // Hash the password for security

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

            $user->save();

            return response()->json([
                'status' => 'success',
                'message' => 'Profile updated successfully',
                'user' => $user
            ], 200);
        } catch (ValidationException $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Validation failed',
                'errors' => $e->errors()
            ], 422);
        } catch (Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'An error occurred ',
                'error' => $e->getMessage()
            ], 500);
        }
    }

  
    public function logout(Request $request): JsonResponse
    {
        try {
            Auth::guard('web')->logout();

            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return response()->json([
                'status' => 'success',
                'message' => 'Logged out successfully'
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to logout',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
