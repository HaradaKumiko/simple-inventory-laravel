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





Route::group(['middleware' => 'auth'], function() {
    Route::get('/product', [ProductController::class, 'findAllProductController'])->name('products.index');
    Route::get('/product/create', [ProductController::class, 'createProductController'])->name('products.create');
    Route::get('/product/edit/{product_id}', [ProductController::class, 'editProductController'])->name('products.edit');
    Route::get('/product/{product_id}', [ProductController::class, 'viewProductController'])->name('products.view');
    Route::put('/product/{product_id}', [ProductController::class, 'updateProductController'])->name('products.update');
    Route::delete('/product/{product_id}', [ProductController::class, 'deleteProductController'])->name('products.delete');
    Route::post('/product/create', [ProductController::class, 'storeProductController'])->name('products.store');
});

Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
