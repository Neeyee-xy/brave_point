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
    return view('pages.shop');
});
Route::get('/index', function () {
    return view('pages.index');
});

Route::get('/phone', function () {
    return view('pages.phone');
});
Route::get('/appliance', function () {
    return view('pages.appliance');
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
Route::get('/shop', function () {
    return view('pages.shop');
});
Route::get('/blog', function () {
    return view('pages.blog');
});
Route::get('/category', function () {
    return view('pages.category');
});
Route::get('/sign_in', function () {
    return view('pages.sign_in');
});
Route::get('/sign_up', function () {
    return view('pages.sign_up');
});
Route::get('/forget_password', function () {
    return view('pages.forget_password');
});
Route::get('/change_password', function () {
    return view('pages.change_password');
});


