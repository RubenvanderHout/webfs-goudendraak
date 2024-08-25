<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DishController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\CustomerController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');
Route::get('/orders',[OrderController::class,'index'])->name('orders.index');
Route::get('/restaurant',[RestaurantController::class,'index'])->name('restaurant.index');
Route::get('/table/{id}',[RestaurantController::class,'show'])->name('restaurant.show');
Route::resource('customers',CustomerController::class);
Route::resource('dishes', DishController::class);
Route::resource('categories', CategoryController::class);
Route::get('/menu/pdf', [MenuController::class, 'exportToPDF'])->name('menu.pdf');
Route::post('/order/add', [OrderController::class, 'addToOrder'])->name('order.add');
Route::get('/order', [OrderController::class, 'viewOrder'])->name('order.view');
Route::post('/order/update', [OrderController::class, 'updateOrder'])->name('order.update');
Route::post('/order/remove', [OrderController::class, 'removeFromOrder'])->name('order.remove');
Route::post('/order/store', [OrderController::class, 'store'])->name('order.store');
