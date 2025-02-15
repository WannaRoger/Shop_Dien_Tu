<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController as AuthAdminController;
use App\Http\Controllers\Clients\AuthController as AuthClientController;
use App\Http\Controllers\Clients\GoogleController;
use App\Http\Controllers\Clients\HomeController as HomeClientController;
use App\Http\Controllers\Clients\ProductsController as ClientsProductsController;
use App\Http\Controllers\Admin\ProductCategoriesController;



Route::get('/dang-nhap', [AuthClientController::class, 'showLoginForm'])->name('login');
Route::post('/xu-ly-dang-nhap', [AuthClientController::class, 'login'])->name('login.store');
Route::get('/dang-ky', [AuthClientController::class, 'showRegistrationForm'])->name('register');
Route::post('/xu-ly-dang-ky', [AuthClientController::class, 'register'])->name('register.store');
Route::get('/dang-xuat', [AuthClientController::class, 'logout'])->name('logout')->middleware('auth');
Route::get('/authorized/google', [GoogleController::class, 'redirectToGoogle'])->name('auth.google');
Route::get('/authorized/google/callback', [GoogleController::class, 'handleGoogleCallback']);
// Client
Route::get('/', [HomeClientController::class, 'index'])->name('home.index');
Route::get('/san-pham', [ClientsProductsController::class, 'index'])->name('productsClient.index');
Route::get('/san-pham/{slug?}', [ClientsProductsController::class, 'productByCategory'])->name('productsClient.productByCategory');
Route::get('/san-pham/{id}/chi-tiet', [ClientsProductsController::class, 'show'])->name('productsClient.show');
    // giỏ hàng

     // Thanh toán

    // voucher

    // Đơn hàng

    //Tài khoản
    
// Admin
Route::get('/admin/dang-nhap', [AuthAdminController::class, 'showLoginForm'])->name('loginAdmin');
Route::post('/admin/xu-ly-dang-nhap', [AuthAdminController::class, 'login'])->name('loginAdmin.store');
Route::get('/admin/dang-ky', [AuthAdminController::class, 'showRegistrationForm'])->name('registerAdmin');
Route::post('/admin/xu-ly-dang-ky', [AuthAdminController::class, 'register'])->name('registerAdmin.store');
Route::get('/admin/dang-xuat', [AuthAdminController::class, 'logout'])->name('logoutAdmin')->middleware('auth');
// authUser:1 => admin
Route::prefix('danh-muc')->group(function () {
    Route::get('/danh-sach', [ProductCategoriesController::class, 'index'])->name('productCategories.index');
    Route::get('/them', [ProductCategoriesController::class, 'create'])->name('productCategories.create');
    Route::post('/them-xu-ly', [ProductCategoriesController::class, 'store'])->name('productCategories.store');
    Route::get('/sua/{id}', [ProductCategoriesController::class, 'edit'])->name('productCategories.edit');
    Route::put('/sua-xu-ly/{id}', [ProductCategoriesController::class, 'update'])->name('productCategories.update');
    Route::delete('/xoa/{id}', [ProductCategoriesController::class, 'destroy'])->name('productCategories.destroy');
    Route::put('/sua-trang-thai/{id}', [ProductCategoriesController::class, 'updateStatus'])->name('productCategories.updateStatus');
});