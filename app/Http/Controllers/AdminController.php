<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Employee;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    // public function index()
    // {
    //     return view('pages.dashboard');
    // }
    public function employee()
    {
        return view('pages.employee');
    }
    public function customer()
    {
        return view('pages.customer');
    }
    public function project()
    {
        return view('pages.project');
    }
    public function followup()
    {
        return view('pages.followup');
    }
     public function chat()
{
    $currentUser = Auth::user();

    if ($currentUser->role === 'admin') {
        // Admin: show all users except admin
        $users = User::where('id', '!=', $currentUser->id)->get();
    } else {
        // Employee: show only admin user
        $users = User::where('role', 'admin')->get();
        // OR if you know admin ID = 1, then:
        // $users = User::where('id', 1)->get();
    }

    return view('pages.chat', compact('users'));
}

  public function profile()
{
    $user = Auth::user(); // Get the currently authenticated user
    return view('pages.profile', compact('user'));
}
    
    public function dashboard()
{
    $user = Auth::user();

    if ($user->role === 'admin') {
        $employees = Employee::all(); // admin sees all
    } else {
        $employees = Employee::where('email', $user->email)->get(); // employee sees only their data
    }

    return view('pages.dashboard', compact('employees', 'user'));
}
}
