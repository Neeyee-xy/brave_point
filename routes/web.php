<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\DeliveryController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClientController;

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

// Route::get('/', function () {
//     return view('pages.shop');
// });
// Route::middleware(['Guest',''])->group(function () {


Route::get('/auth/admin/sign_up', function () {
    return view('pages.auth.admin.sign_up')->with(['page_title'=>'Sign In']);;
});
Route::get('/auth/client/sign_up', function () {
    return view('pages.auth.client.sign_up')->with(['page_title'=>'Sign In']);;
});


Route::get('/phone', function () {
    return view('pages.phone');
});
Route::get('/appliance', function () {
    return view('pages.appliance');
});


// Route::get('/cart', function () {
//     return view('pages.cart');
// });
Route::get('/about_us', function () {
    return view('pages.about_us')->with(['page_title'=>'About Us']);;;
});
Route::get('/shop', function () {
    return view('pages.shop');
});

Route::get('/category', function () {
    return view('pages.category');
});
Route::get('/contact', function () {
    return view('pages.contact')->with(['page_title'=>'Contact Us']);
});


Route::get('/change_password', function () {
    return view('pages.change_password');
});


Route::post('/contact_us', [DashboardController::class, 'contact_us'])->name('contact_us');
Route::post('/subscribe', [DashboardController::class, 'subscribe'])->name('subscribe');

Route::post('/auth/admin/create_admin_account', [RegisterController::class, 'create_admin_account'])->name('create_admin_account');

Route::post('/auth/client/create_client_account', [RegisterController::class, 'create_client_account'])->name('create_client_account');

Route::post('/auth/sign_in', [LoginController::class, 'sign_in_user'])->name('sign_in_user');

Route::get('/auth/sign_in', [LoginController::class, 'sign_in'])->name('sign_in');
Route::get('/auth/verifications/{verification_code}', [RegisterController::class, 'verify_user'])->name('verify_user');
Route::get('/auth/verify_token/{verification_code}', [RegisterController::class, 'verify_token'])->name('verify_token');
Route::get('/auth/verified', [RegisterController::class, 'verified'])->name('verified');
Route::get('/auth/forget_password', [RegisterController::class, 'forget_password'])->name('forget_password');
Route::post('/auth/send_password_token', [RegisterController::class, 'send_password_token'])->name('send_password_token');
Route::post('/auth/change_password', [RegisterController::class, 'change_password'])->name('change_password');
// });

Route::middleware(['IncompleteTransactions'])->group(function () {
Route::get('/', [DashboardController::class, 'index'])->name('index');
Route::get('/index', [DashboardController::class, 'index'])->name('index');
Route::get('/blog', [DashboardController::class, 'blog'])->name('blog');
Route::get('/read_post/{slug}', [BlogController::class, 'read_post'])->name('read_post');

   
Route::POST('/count_cart_item', [CartController::class, 'count_cart_item'])->name('count_cart_item');
Route::get('/all_products', [ProductController::class, 'all_products'])->name('all_products');
Route::POST('/fetch_product_details', [ProductController::class, 'fetch_product_details'])->name('fetch_product_details');
Route::POST('/add_to_cart', [CartController::class, 'add_to_cart'])->name('add_to_cart');
Route::POST('/get_cart_items', [CartController::class, 'get_cart_items'])->name('get_cart_items');

Route::POST('/add_qty', [CartController::class, 'add_qty'])->name('add_qty');
Route::POST('/delete_cart_item', [CartController::class, 'delete_cart_item'])->name('delete_cart_item');



});

Route::middleware(['Auth'])->group(function () {
// Route::get('/auth/verifications/{verification_code}', [RegisterController::class, 'verify_user'])->name('verify_user');
Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
Route::post('/count_notifications', [NotificationController::class, 'count_notifications'])->name('count_notifications');
Route::get('/cart', [CartController::class, 'checkout'])->name('checkout')->withoutMiddleware('IncompleteTransactions');;

Route::post('/create_order', [OrderController::class, 'create_order'])->name('create_order')->withoutMiddleware('IncompleteTransactions');;
Route::get('/verify_payment', [OrderController::class, 'verify_payment'])->name('verify_payment')->withoutMiddleware('IncompleteTransactions');;

Route::get('/sign_out', [LoginController::class, 'sign_out'])->name('sign_out');
Route::post('/view_order', [OrderController::class, 'view_order'])->name('view_order');
Route::middleware(['Role'])->group(function () {

Route::prefix('admin')->group(function(){
    Route::get('/dashboard/{year}', [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::get('/transactions', [OrderController::class, 'transactions'])->name('transactions');
    Route::get('/orders', [OrderController::class, 'orders'])->name('orders');
    Route::post('/change_order_status', [OrderController::class, 'change_order_status'])->name('change_order_status');
    Route::post('/dashboard', [DashboardController::class, 'admin_dashboard'])->name('admin_dashboard');
    Route::get('/settings', [DashboardController::class, 'settings'])->name('settings');
    Route::post('/settings', [DashboardController::class, 'save_settings'])->name('save_settings');

    Route::get('/home_page_settings', [DashboardController::class, 'home_page_settings'])->name('home_page_settings');
    Route::post('/save_home_page_settings', [DashboardController::class, 'save_home_page_settings'])->name('save_home_page_settings');
    Route::get('/notifications', [NotificationController::class, 'notifications'])->name('notifications');


    Route::prefix('users')->group(function(){
        Route::prefix('admins')->group(function(){
            Route::get('/', [AdminController::class, 'index'])->name('admins');
            Route::get('/tables', [AdminController::class, 'tables'])->name('tables');
            Route::get('/edit/{id}', [AdminController::class, 'edit'])->name('edit');
            Route::post('/edit/{id}', [AdminController::class, 'update'])->name('update');
            Route::post('/delete', [AdminController::class, 'delete'])->name('delete');
        });
        Route::prefix('clients')->group(function(){
            Route::get('/', [ClientController::class, 'index'])->name('clients');
            Route::get('/tables', [ClientController::class, 'tables'])->name('tables');
            Route::get('/edit/{id}', [ClientController::class, 'edit'])->name('edit');
            Route::post('/edit/{id}', [ClientController::class, 'update'])->name('update');
            Route::post('/delete', [ClientController::class, 'delete'])->name('delete');
        });



    });
    Route::prefix('blog')->group(function(){
    Route::get('/', [BlogController::class, 'index'])->name('blog');
    Route::post('/', [BlogController::class, 'create'])->name('create');
    Route::get('/tables', [BlogController::class, 'tables'])->name('tables');
    Route::get('/edit/{id}', [BlogController::class, 'edit'])->name('edit');
    Route::post('/edit/{id}', [BlogController::class, 'update'])->name('update');
    Route::post('/delete', [BlogController::class, 'delete'])->name('delete');
    Route::get('/blog_settings', [BlogController::class, 'blog_settings'])->name('blog_settings');
    Route::post('/save_settings', [BlogController::class, 'save_settings'])->name('save_settings');



    });
     Route::prefix('category')->group(function(){
    Route::get('/', [CategoryController::class, 'index'])->name('category');
    Route::post('/', [CategoryController::class, 'create'])->name('create');
    Route::get('/tables', [CategoryController::class, 'tables'])->name('tables');
    Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('edit');
    Route::post('/edit/{id}', [CategoryController::class, 'update'])->name('update');
    Route::post('/delete', [CategoryController::class, 'delete'])->name('delete');



    });
    Route::prefix('product')->group(function(){
    Route::get('/', [ProductController::class, 'index'])->name('product');
    Route::post('/', [ProductController::class, 'create'])->name('create');
    Route::get('/tables', [ProductController::class, 'tables'])->name('tables');
    Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('edit');
    Route::post('/edit/{id}', [ProductController::class, 'update'])->name('update');
    Route::post('/delete', [ProductController::class, 'delete'])->name('delete');



    });
     Route::prefix('delivery')->group(function(){
    Route::get('/', [DeliveryController::class, 'index'])->name('delivery');
    Route::post('/', [DeliveryController::class, 'create'])->name('create');
    Route::get('/tables', [DeliveryController::class, 'tables'])->name('tables');
    Route::get('/edit/{id}', [DeliveryController::class, 'edit'])->name('edit');
    Route::post('/edit/{id}', [DeliveryController::class, 'update'])->name('update');
    Route::post('/delete', [DeliveryController::class, 'delete'])->name('delete');



    });
});
});


Route::middleware(['IncompleteTransactions'])->group(function () {
 



Route::prefix('client')->group(function(){
    Route::post('/dashboard', [DashboardController::class, 'client_dashboard'])->name('client_dashboard');
    Route::get('/orders', [OrderController::class, 'orders'])->name('orders');
    Route::get('/transactions', [OrderController::class, 'transactions'])->name('transactions');
    Route::post('/change_order_status', [OrderController::class, 'change_order_status'])->name('change_order_status');
    Route::get('/notifications', [NotificationController::class, 'notifications'])->name('notifications');



    });
});


});



