<?php
use App\Http\Controllers\DishController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::resource('orders',OrderController::class);
Route::resource('dishes', DishController::class);
Route::get('/menu/pdf', [MenuController::class, 'exportToPDF'])->name('menu.pdf');
