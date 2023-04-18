<?php

use App\Http\Controllers\ProductController;
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
    return view('login');
});

Route::get('/register', function () {
    return view('register');
});

Route::controller(ProductController::class)->group(function () {
    Route::get('/products', 'index');
    //single product
    Route::get('/products/{product}', 'show');
});

Route::get('/contactUs', function () {
    return view('contactUs');
});

Route::get('/aboutUs', function () {
    return view('aboutUs');
});

Route::get('/product', function () {
    return view('product');
});

Route::get('/faq', function () {
    return view('faq');
});