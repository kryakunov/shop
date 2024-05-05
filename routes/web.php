<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AdminController;

Route::get('/', [ProductController::class, 'index']);

Route::resource('/admin', AdminController::class);
Route::resource('/products', ProductController::class);
Route::resource('/category', CategoryController::class);
