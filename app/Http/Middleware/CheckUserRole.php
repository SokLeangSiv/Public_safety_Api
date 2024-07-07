<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\BackUser;


class CheckUserRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $role
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check()) {
            $user = Auth::user();
            $adminUser = BackUser::where('email', 'admin@gmail.com')->first();

            if ($adminUser && $user->email === $adminUser->email) {
                return response()->json(['message' => 'Admin cannot access user routes'], 403);
            }
        }

        return $next($request);
    }
}
