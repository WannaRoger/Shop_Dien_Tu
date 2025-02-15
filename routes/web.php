<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController as AuthAdminController;
use App\Http\Controllers\Clients\AuthController as AuthClientController;
use App\Http\Controllers\Admin\HomeController;



Route::get('/dang-nhap', [AuthClientController::class, 'showLoginForm'])->name('login');
Route::post('/xu-ly-dang-nhap', [AuthClientController::class, 'login'])->name('login.store');
Route::get('/dang-ky', [AuthClientController::class, 'showRegistrationForm'])->name('register');
Route::post('/xu-ly-dang-ky', [AuthClientController::class, 'register'])->name('register.store');
Route::get('/dang-xuat', [AuthClientController::class, 'logout'])->name('logout')->middleware('auth');
Route::get('/authorized/google', [GoogleController::class, 'redirectToGoogle'])->name('auth.google');
Route::get('/authorized/google/callback', [GoogleController::class, 'handleGoogleCallback']);
// Client

    // giỏ hàng

     // Thanh toán

    // voucher

    // Đơn hàng

    //Tài khoản


// Admin

// authUser:1 => admin
