<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        
       if (!Auth::guard('api')->check()) {
            return response()->json(['status' => false, 'error' => 'Unauthorized'], 401);
        }
      
 
        return $next($request);
    }
}
