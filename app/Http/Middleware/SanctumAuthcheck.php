<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Laravel\Sanctum\PersonalAccessToken;
use Symfony\Component\HttpFoundation\Response;

class SanctumAuthCheck
{
    public function handle(Request $request, Closure $next): Response
    {
    //  dd(auth()->user('sanctum'));
        // Get the token from Authorization Bearer header
      

        if (!auth()->user('sanctum')) {
            return redirect('/loginpage');
        }

        // Find token in database
        // $accessToken = PersonalAccessToken::findToken($tokenString);

        // if (!$accessToken || !$accessToken->tokenable) {
        //     // Invalid token or no user
        //     return redirect('/loginpage');
        // }

        // If token is valid and belongs to a user
        return $next($request);
    }
}
