<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\StaffController;




Route::post('login', [AuthController::class, 'login']);

// ✅ API Protected Routes (Token Auth)
Route::middleware('auth.api')->group(function () {
    
    // Route::post('logout', [AuthController::class, 'logoutapi']);
     Route::get('logoutapi', [AuthController::class, 'logoutapi']);
     Route::get('user', [AuthController::class, 'user']);
    Route::get('dashboard', [AdminController::class, 'dashboard']);
    //staff 
    Route::post('/employees/store', [StaffController::class, 'store'])->name('employees.store');
     Route::get('/employees/all', [StaffController::class, 'getAllEmployees'])->name('employees.all');
}); 

