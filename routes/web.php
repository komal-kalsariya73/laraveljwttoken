<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;

Route::middleware('auth.web.req')->group(function () {
Route::get('/loginpage', [AuthController::class, 'loginpage'])->name('loginpage');
});


Route::post('/login', [AuthController::class, 'loginWeb'])->name('login'); // Corrected name



Route::middleware('auth.web')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/employee', [AdminController::class, 'employee'])->name('employee');
    Route::get('/customer', [AdminController::class, 'customer'])->name('customer');
    Route::get('/project', [AdminController::class, 'project'])->name('project');
    Route::get('/followup', [AdminController::class, 'followup'])->name('followup');
    Route::get('/profile', [AdminController::class, 'profile'])->name('profile');
});
