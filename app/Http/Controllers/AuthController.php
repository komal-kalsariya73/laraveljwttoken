<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{
    // Login Page (Optional for web view)
    public function loginpage()
    {
        return view('pages.login');
    }
 public function loginWeb(Request $request)
    {
        $credentials = $request->only('email', 'password');
// print_r($credentials);
// die;
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        }

        return back()->withErrors([
            'email' => 'Invalid credentials',
        ]);
    }
    // ✅ Login API
   public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);
 
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();
        
            $token = $user->createToken('LaravelPassportToken')->accessToken;
 
            return response()->json(['status' => true,'token' => $token], 200);
        } else {
            return response()->json(['status' => false,'error' => 'Login Credential Wrong'], 401);
        }
    }
    // ✅ Logout API
    public function logout(Request $request)
    {
       Auth::guard('web')->logout(); // Logout user
        $request->session()->invalidate(); // Invalidate the session
        $request->session()->regenerateToken(); // Regenerate CSRF token
 
        return redirect('/loginpage');
     
    }

   public function logoutapi(Request $request)
{
    $user = $request->user();

    if ($user) {
        $user->token()->revoke();
        return response()->json(['status' => true, 'message' => "Logout successful."], 200);
    } else {
        return response()->json(['status' => false, 'message' => "Unauthenticated."], 401);
    }
}


    // ✅ Get Authenticated User
    public function user(Request $request)
    {
        return response()->json($request->user());
    }
}
