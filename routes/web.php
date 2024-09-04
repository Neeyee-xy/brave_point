<?php

use Illuminate\Support\Facades\Route;

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
    return view('pages.index');
});

Route::get('/all_products', function () {
    return view('pages.all_products');
});
Route::get('/cart', function () {
    return view('pages.cart');
});
Route::get('/about_us', function () {
    return view('pages.about_us');
});


