<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Laravel\Sanctum\PersonalAccessToken;
use Symfony\Component\HttpFoundation\Response;

class SanctumAuth
{
    public function handle(Request $request, Closure $next): Response
    {
        // Get token from Authorization header (Bearer token)
        $token = $request->bearerToken();

        if (!$token) {
            return response()->json(['message' => 'Token not provided'], 401);
        }

        // Find token in sanctum table
        $accessToken = PersonalAccessToken::findToken($token);

        if (!$accessToken) {
            return response()->json(['message' => 'Invalid token'], 401);
        }

        // Get user from token and authenticate
        $user = $accessToken->tokenable;
        auth()->login($user);

        return $next($request);
    }
}
