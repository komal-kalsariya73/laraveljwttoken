<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\StaffController;

Route::middleware('auth.web.req')->group(function () {
Route::get('/loginpage', [AuthController::class, 'loginpage'])->name('loginpage');
});


Route::post('/login', [AuthController::class, 'loginWeb'])->name('login'); // Corrected name



Route::middleware('auth.web')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/employee', [AdminController::class, 'employee'])->name('employee');
      // Route::post('/employee/store', [StaffController::class, 'store'])->name('employee.store');
    Route::get('/employee/view', [StaffController::class, 'employeeview'])->name('employee.view');
    Route::get('/employee/edit/{id}', [StaffController::class, 'editpage'])->name('employee.edit');
    Route::post('/employees/update/{id}', [StaffController::class, 'update'])->name('employee.update');
  Route::delete('/employee/delete/{id}', [StaffController::class, 'destroy'])->name('employees.destroy');
    Route::get('/customer', [AdminController::class, 'customer'])->name('customer');
    Route::get('/project', [AdminController::class, 'project'])->name('project');
      Route::get('/chat', [AdminController::class, 'chat'])->name('chat');
    Route::get('/followup', [AdminController::class, 'followup'])->name('followup');
    Route::get('/profile', [AdminController::class, 'profile'])->name('profile');
});
