<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DishController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');
Route::resource('orders',OrderController::class);
Route::resource('dishes', DishController::class);
Route::resource('categories', CategoryController::class);
Route::get('/menu/pdf', [MenuController::class, 'exportToPDF'])->name('menu.pdf');
