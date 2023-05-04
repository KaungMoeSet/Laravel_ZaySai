<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PaymentMethodController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductImageController;
use App\Http\Controllers\SubCategoryController;
use Illuminate\Support\Facades\Auth;
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

// Route::controller(ProductController::class)->group(function () {
//     Route::get('/allProducts', 'index');
//     //single product
//     Route::get('/products/{product}', 'show');
// });

Route::get('/contactUs', function () {
    return view('pages.contactUs');
});

Route::get('/aboutUs', function () {
    return view('pages.aboutUs');
});

Route::get('/allProducts', function () {
    return view('products');
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
Route::resource('product', ProductController::class)->middleware('auth');
Route::get('/get-subCategoires/{id}',[ProductController::class, 'getSubCategories']);

// Product Image
Route::resource('productImage', ProductImageController::class)->middleware('auth');
// Route::resource('/productImage/{id}', [ProductImageController::class, 'destroy']);

// Categories
Route::resource('subCategory', SubCategoryController::class)->middleware('auth');
Route::resource('category', CategoryController::class)->middleware('auth');

// Payments
Route::resource('paymentMethod', PaymentMethodController::class)->middleware('auth');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
