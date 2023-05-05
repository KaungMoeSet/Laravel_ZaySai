<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HeroCarouselController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PaymentMethodController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductImageController;
use App\Http\Controllers\SubCategoryController;
use App\Models\HeroCarousel;
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

Route::get('/profile', function () {
    return view('customer.myProfile');
});

Route::get('/category/create/{name}', [CategoryController::class, 'create']);

Route::get('/category/subCategory/create/{name}', [CategoryController::class, 'create']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['guest'])->group(function () {
    Route::get('/login', [\App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [\App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login.submit');

    Route::get('/register', [\App\Http\Controllers\Auth\RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [\App\Http\Controllers\Auth\RegisterController::class, 'register'])->name('register.submit');
});

Route::middleware(['auth.user'])->group(function () {
    // User routes here
});

Route::match(['get', 'post'], '/admin', [AdminController::class, 'index']);

// Route::prefix('admin')->middleware(['auth.admin'])->group(function () {

    // Admin
    Route::resource('admin', AdminController::class);

    // Products
    Route::resource('product', ProductController::class);
    Route::get('/get-subCategoires/{id}', [ProductController::class, 'getSubCategories']);

    // Product Image
    Route::resource('productImage', ProductImageController::class);
    // Route::resource('/productImage/{id}', [ProductImageController::class, 'destroy']);

    // Categories
    Route::resource('subCategory', SubCategoryController::class);
    Route::resource('category', CategoryController::class);

    // Payments
    Route::resource('paymentMethod', PaymentMethodController::class);

    // Hero Carousel
    Route::resource('heroCarousel', HeroCarouselController::class);
// });

Route::prefix('admin')->middleware(['guest:admin'])->group(function () {
    Route::view('/login', 'auth.login', ['url' => 'admin']);
    Route::post('/login', [\App\Http\Controllers\Auth\LoginController::class, 'login'])->name('admin.login');
});

Route::middleware(['auth:admin'])->group(function () {
    Route::get('/admin/create', 'Admin\AdminController@create')->name('admin.create');
    Route::post('/admin', 'Admin\AdminController@store')->name('admin.store');
});