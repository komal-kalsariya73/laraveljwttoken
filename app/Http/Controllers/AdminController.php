<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

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
    public function profile()
    {
        return view('pages.profile');
    }
  
    
    public function dashboard()
    {
        
        return view('pages.dashboard');
    }
}
