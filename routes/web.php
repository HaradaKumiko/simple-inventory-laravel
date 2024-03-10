<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/product', [ProductController::class, 'findAllProductController'])->name('products.index');
Route::get('/product/create', [ProductController::class, 'createProductController'])->name('products.create');
Route::post('/product/create', [ProductController::class, 'storeProductController'])->name('products.store');
