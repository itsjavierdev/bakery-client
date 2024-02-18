<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;

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
    return view('customer.index');
});

Route::get('/shop', [CustomerController::class, 'shop'])->name('shop');
Route::get('/cart', [CustomerController::class, 'cart'])->name('cart');
Route::get('/product/{productSlug}', [CustomerController::class, 'showProduct'])->name('show-product');


Route::middleware([
    'auth:sanctum', 
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/checkout', [CustomerController::class, 'checkout'])->name('checkout');
    Route::get('/addresses', [CustomerController::class, 'addresses'])->name('addresses');
    Route::get('/thankyou', [CustomerController::class, 'thankyou'])->name('thankyou');
});
