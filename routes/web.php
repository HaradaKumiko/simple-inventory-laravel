<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductStockHistoryController;

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
    Route::get('/product/edit/{product_id}', [ProductController::class, 'editProductController'])->name('products.edit')->middleware('checkProductOwner');
    Route::get('/product/{product_id}', [ProductController::class, 'viewProductController'])->name('products.view');
    Route::put('/product/{product_id}', [ProductController::class, 'updateProductController'])->name('products.update')->middleware('checkProductOwner');;
    Route::delete('/product/{product_id}', [ProductController::class, 'deleteProductController'])->name('products.delete');
    Route::post('/product/create', [ProductController::class, 'storeProductController'])->name('products.store');

    Route::get('/product-history/create/{product_id}', [ProductStockHistoryController::class, 'createProductStockHistoryController'])->name('products.history.create');
    Route::post('/product-history/create', [ProductStockHistoryController::class, 'storeProductStockHistoryController'])->name('products.history.store');

});

Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
