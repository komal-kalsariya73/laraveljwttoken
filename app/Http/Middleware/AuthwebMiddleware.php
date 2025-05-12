<?php
 
namespace App\Http\Middleware;
 
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\Guard;
 
class AuthwebMiddleware
{
    public function handle(Request $request, Closure $next)
    {

        if (!Auth::guard('web')->check()) {
            return redirect()->route('loginpage'); // Redirect to login if not authenticated
        }
       
 
        return $next($request);
    }
}
 