<?php

use App\Http\Controllers\MainConroller;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/shopping_cart', [OrderController::class, 'shoppingCart'])->name('shopping_cart');
Route::post('/shopping_cart', [OrderController::class, 'addToCart'])->name('add_to_cart');
Route::post('/shopping_cart/update', [OrderController::class, 'updateCart'])->name('update_cart');
Route::post('/shopping_cart/remove/{id}', [OrderController::class, 'removeFromCart'])->name('remove_from_cart');
Route::get('/order', [OrderController::class, 'order'])->name('order');
Route::post('/order/user', [OrderController::class, 'orderUser'])->name('order_user');

Route::get('/', [MainConroller::class, 'index'])->name('index');
Route::get('/{category}/{product}', [MainConroller::class, 'productCart'])->name('product_cart');
Route::get('/{category}', [MainConroller::class, 'category'])->name('category');
