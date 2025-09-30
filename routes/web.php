<?php

use App\Http\Controllers\Panel\AuthController;
use App\Http\Controllers\Panel\CategoryController;
use App\Http\Controllers\Panel\ProductController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->group(function () {
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'postLogin'])->name('login.send');

    Route::middleware('auth')->group(function () {
        Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

        Route::get('/', [CategoryController::class, 'index'])->name('admin-panel');
        Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
        Route::post('/categories/create', [CategoryController::class, 'store'])->name('categories.store');
        Route::get('/categories/{category}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
        Route::post('/categories/{category}/edit', [CategoryController::class, 'update'])->name('categories.update');
        Route::get('/categories/{category}/destroy', [CategoryController::class, 'destroy'])->name('categories.destroy');

        Route::get('/categories/{category}/products', [ProductController::class, 'index'])->name('products.index');
    });
});
