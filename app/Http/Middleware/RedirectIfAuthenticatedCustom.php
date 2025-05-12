<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticatedCustom
{
    public function handle(Request $request, Closure $next)
{
    $user = auth('sanctum')->user();

    if ($user) {
        // ✅ Optional: double-check if token is still valid in DB
        $token = $request->bearerToken();

        $accessToken = \Laravel\Sanctum\PersonalAccessToken::findToken($token);

        if ($accessToken) {
            // Token is still valid → redirect to dashboard
            return redirect('/dashboard');
        }
    }

    return $next($request);
}
}
