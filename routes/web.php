<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BakeryController;
use App\Http\Controllers\AdminController;

// Storefront Publik & Marketplace Tanpa Login
Route::get('/', [BakeryController::class, 'landing'])->name('landing');
Route::get('/home', function () {
    return redirect()->route('landing');
})->name('home');

Route::get('/shop', [BakeryController::class, 'shop'])->name('shop');
Route::get('/order', function () {
    return redirect()->route('shop');
})->name('order');
Route::post('/order', [BakeryController::class, 'processOrder'])->name('order.process');
Route::get('/invoice/{code}', [BakeryController::class, 'showInvoice'])->name('order.invoice');

// Admin Auth
Route::get('/login', [AdminController::class, 'showLogin'])->name('login');
Route::post('/login', [AdminController::class, 'login'])->name('login.post');
Route::post('/logout', [AdminController::class, 'logout'])->name('logout');

// Admin Studio Control
Route::get('/admin', function () {
    return redirect()->route('admin.dashboard');
});
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    
    // CRUD Produk
    Route::post('/products', [AdminController::class, 'storeProduct'])->name('products.store');
    Route::put('/products/{id}', [AdminController::class, 'updateProduct'])->name('products.update');
    Route::delete('/products/{id}', [AdminController::class, 'destroyProduct'])->name('products.destroy');

    // Manajemen Pesanan
    Route::post('/orders', [AdminController::class, 'storeOrder'])->name('orders.store');
    Route::patch('/order/{id}/status', [AdminController::class, 'updateOrderStatus'])->name('order.status');
    Route::delete('/order/{id}', [AdminController::class, 'destroyOrder'])->name('order.destroy');

    // Pengaturan Rekening Bank & Pembayaran
    Route::post('/bank-accounts', [AdminController::class, 'storeBankAccount'])->name('banks.store');
    Route::match(['put', 'post'], '/bank-accounts/{id}', [AdminController::class, 'updateBankAccount'])->name('banks.update');
    Route::delete('/bank-accounts/{id}', [AdminController::class, 'destroyBankAccount'])->name('banks.destroy');
});