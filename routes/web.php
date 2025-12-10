<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AuthController;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminHomeController;
use App\Http\Controllers\AdminOrderController;
use App\Http\Controllers\AdminProductController; // ✅ TAMBAH INI!
use App\Http\Controllers\BucketController;
use App\Http\Controllers\ProductController;


// ======================================================
// PUBLIC ROUTES
// ======================================================

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/catalog', [HomeController::class, 'catalog'])->name('catalog');
Route::get('/order/details/{id}', [OrderController::class, 'showOrderDetails'])->name('order.details');
Route::post('/order/store', [OrderController::class, 'storeOrder'])->name('order.store'); 


// ======================================================
// AUTH ROUTES (LOGIN / LOGOUT)
// ======================================================

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.process');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


// ======================================================
// ADMIN ROUTES
// ======================================================
// Middleware: auth + is_admin
// Prefix: admin/...
// ======================================================

Route::middleware(['auth'])->group(function () {
    
    // Dashboard Admin
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])
        ->name('admin.dashboard');

    // Admin Orders Routes
    Route::get('/admin/orders', [AdminOrderController::class, 'index'])
        ->name('admin.orders');

    Route::get('/admin/orders/{id}', [AdminOrderController::class, 'show'])
        ->name('admin.order.show');

    Route::post('/admin/orders/{id}/accept', [AdminOrderController::class, 'accept'])
        ->name('admin.order.accept');

    // Admin Home Routes
    Route::get('/admin/home/edit', [AdminHomeController::class, 'edit'])
        ->name('admin.home.edit');

    Route::put('/admin/home/update', [AdminHomeController::class, 'update'])
        ->name('admin.home.update');

    // ✅ PERBAIKAN: Products Routes - PAKAI ROUTE MANUAL (BUKAN RESOURCE)
    Route::get('/admin/products', [AdminProductController::class, 'index'])->name('admin.products.index');
    Route::get('/admin/products/create', [AdminProductController::class, 'create'])->name('admin.products.create');
    Route::post('/admin/products', [AdminProductController::class, 'store'])->name('admin.products.store');
    Route::get('/admin/products/{id}', [AdminProductController::class, 'show'])->name('admin.products.show');
    Route::get('/admin/products/{id}/edit', [AdminProductController::class, 'edit'])->name('admin.products.edit');
    Route::put('/admin/products/{id}', [AdminProductController::class, 'update'])->name('admin.products.update');
    Route::delete('/admin/products/{id}', [AdminProductController::class, 'destroy'])->name('admin.products.destroy');
});

// ======================================================
// BUCKET ROUTES (jika ada)
// ======================================================
// Route::get('/bucket', [BucketController::class, 'index'])->name('bucket');