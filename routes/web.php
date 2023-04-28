<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SubCategoryController;
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
    return view('index');
});

Route::get('/login', function () {
    return view('pages.login');
});

Route::get('/register', function () {
    return view('pages.register');
});

Route::controller(ProductController::class)->group(function () {
    Route::get('/products', 'index');
    //single product
    Route::get('/products/{product}', 'show');
});

Route::get('/contactUs', function () {
    return view('pages.contactUs');
});

Route::get('/aboutUs', function () {
    return view('pages.aboutUs');
});

Route::get('/product', function () {
    return view('product');
});

Route::get('/faq', function () {
    return view('pages.faq');
});

Route::get('/privacyPolicy', function () {
    return view('pages.privacyPolicy');
});

Route::get('/cart', function () {
    return view('customer.cart');
});

Route::get('/checkout', function () {
    return view('customer.checkout');
});

Route::get('/trackOrder', function () {
    return view('pages.trackOrder');
});

Route::get('/profile', function() {
    return view('customer.profile');
});

Route::get('/category/create/{name}', [CategoryController::class, 'create']);

Route::get('/category/subCategory/create/{name}', [CategoryController::class, 'create']);


// Admin
Route::resource('admin', AdminController::class);

// Products
Route::resource('product', ProductController::class);
Route::get('/get-subCategoires/{id}',[ProductController::class, 'getSubCategories']);

// Categories
Route::resource('subCategory', SubCategoryController::class);
Route::resource('category', CategoryController::class);