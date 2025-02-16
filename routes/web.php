<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController as AuthAdminController;
use App\Http\Controllers\Clients\AuthController as AuthClientController;
use App\Http\Controllers\Admin\HomeController;

use App\Http\Controllers\Admin\BannersController;
use App\Http\Controllers\Admin\ProductCategoriesController;
use App\Http\Controllers\Admin\AttributesController;
use App\Http\Controllers\Admin\UsersController;


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
Route::middleware(['auth', 'authUser:1'])->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('/', [HomeController::class, 'index'])->name('admin.home.index');
        Route::get('/test', [HomeController::class, 'test'])->name('admin.home.test');
        Route::prefix('banners')->group(function () {
            Route::get('/danh-sach', [BannersController::class, 'index'])->name('banner.index');
            Route::get('/them', [BannersController::class, 'create'])->name('banner.create');
            Route::post('/them-xu-ly', [BannersController::class, 'store'])->name('banner.store');
            Route::get('/sua/{id}', [BannersController::class, 'edit'])->name('banner.edit');
            Route::put('/banner/{id}', [BannersController::class, 'update'])->name('banner.update');
            Route::put('/toggleBannerStatus/{id}', [BannersController::class, 'toggleBannerStatus'])->name('banner.updateStatus');
            Route::delete('/xoa/{id}', [BannersController::class, 'destroy'])->name('banner.destroy');
        });


        Route::prefix('tai-khoan')->group(function () {
            Route::get('/danh-sach', [UsersController::class, 'index'])->name('user.index');
            Route::get('/them', [UsersController::class, 'create'])->name('user.create');
            Route::post('/them-xu-ly', [UsersController::class, 'store'])->name('user.store');
            Route::get('/chi-tiet/{id}', [UsersController::class, 'show'])->name('user.show');
            Route::get('/sua/{id}', [UsersController::class, 'edit'])->name('user.edit');
            Route::put('/sua-xu-ly/{id}', [UsersController::class, 'update'])->name('user.update');
            Route::delete('/xoa/{id}', [UsersController::class, 'destroy'])->name('user.destroy');
            Route::post('/bulk-delete', [UsersController::class, 'bulkDelete'])->name('user.bulkDelete');
        });

        Route::prefix('danh-muc')->group(function () {
            Route::get('/danh-sach', [ProductCategoriesController::class, 'index'])->name('productCategories.index');
            Route::get('/them', [ProductCategoriesController::class, 'create'])->name('productCategories.create');
            Route::post('/them-xu-ly', [ProductCategoriesController::class, 'store'])->name('productCategories.store');
            Route::get('/sua/{id}', [ProductCategoriesController::class, 'edit'])->name('productCategories.edit');
            Route::put('/sua-xu-ly/{id}', [ProductCategoriesController::class, 'update'])->name('productCategories.update');
            Route::delete('/xoa/{id}', [ProductCategoriesController::class, 'destroy'])->name('productCategories.destroy');
            Route::put('/sua-trang-thai/{id}', [ProductCategoriesController::class, 'updateStatus'])->name('productCategories.updateStatus');
        });

        Route::prefix('thuoc-tinh')->group(function () {
            Route::get('/danh-sach', [AttributesController::class, 'index'])->name('attributes.index');
            Route::get('/them', [AttributesController::class, 'create'])->name('attributes.create');
            Route::post('/them-xu-ly', [AttributesController::class, 'store'])->name('attributes.store');
            Route::get('/chi-tiet/{id}', [AttributesController::class, 'show'])->name('attributes.show');
            Route::get('/sua/{id}', [AttributesController::class, 'edit'])->name('attributes.edit');
            Route::put('/sua-xu-ly/{id}', [AttributesController::class, 'update'])->name('attributes.update');
            Route::delete('/xoa/{id}', [AttributesController::class, 'destroy'])->name('attributes.destroy');
            Route::put('/sua-trang-thai/{id}', [ProductCategoriesController::class, 'updateStatus'])->name('attributes.updateStatus');
        });
    });
});
