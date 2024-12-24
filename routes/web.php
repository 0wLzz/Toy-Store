<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ToyController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/', [ToyController::class, 'index'])->name('admin_table');
    Route::get('/create', [ToyController::class, 'create'])->name('add_toy');
    Route::post('/store', [ToyController::class, 'store'])->name('store_toy');
    Route::get('/edit/{toy}', [ToyController::class, 'edit'])->name('edit_toy');
    Route::post('/update/{toy}', [ToyController::class, 'update'])->name('update_toy');
    Route::delete('/delete/{toy}', [ToyController::class, 'delete'])->name('delete_toy');
    Route::get('/search', [ToyController::class, 'search'])->name('search_toy');
    Route::get('/category/{category}', [ToyController::class, 'category'])->name('category_toy');
});

Route::prefix('')->group(function () {
    Route::get('/', [AuthController::class, 'homepage'])->name('login');
    Route::post('/register', [AuthController::class, 'userRegister'])->name('user_register');
    Route::post('/login', [AuthController::class, 'userLogin'])->name('user_login');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::post('/top-up', [AuthController::class, 'topUp'])->name('top_up');
    Route::get('/order/{toy}', [OrderController::class, 'order'])->name('order_toy');
    Route::get('/category/{category}', [OrderController::class, 'category'])->name('category_toy_main');


    Route::get('/checkout/{total}', [OrderController::class, 'checkout'])->name('checkout_toy');
    Route::get('/buy/{toy}', [OrderController::class, 'buy'])->name('buy_toy');
    Route::delete('/delete/{id}', [OrderController::class, 'delete_from_cart'])->name('delete_from_cart');
});






// Route::get('/order/{toy}' ,'order', ToyController::class)->name('');
