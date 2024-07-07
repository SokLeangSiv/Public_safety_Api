<?php

namespace App\Http\Controllers\API\Back;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\BackUser;
use App\Http\Controllers\Controller as Controller;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\DB;


class APIbackauthController extends Controller
{
    use HasApiTokens;

    public function backlogin(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        if ($request->email !== 'admin@gmail.com') {
            return response()->json(['message' => 'Invalid email'], 403);
        }

        $admin = BackUser::where('email', $request->email)->first();

        if (!$admin || !Hash::check($request->password, $admin->password)) {
            return response()->json(['message' => 'Invalid Password'], 401);
        }

        // Generate a token for the admin
        $token = $admin->createToken('admin_token')->plainTextToken;

        return response()->json([
            'access_token' => $token,
            'token_type' => 'Bearer',
        ]);
    }



}
