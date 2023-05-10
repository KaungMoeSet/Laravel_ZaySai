<?php

use App\Http\Controllers\AddressController;
use App\Models\HeroCarousel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\HeroCarouselController;
use App\Http\Controllers\ProductImageController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentMethodController;

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

Route::resource('/', HomeController::class);

Route::get('/login', [LoginController::class, 'showLoginForm']);

// Route::controller(ProductController::class)->group(function () {
//     Route::get('/allProducts', 'index');
//     //single product
//     Route::get('/products/{product}', 'show');
// });

Route::get('/contactUs', [HomeController::class, 'showContactUsPage']);

Route::get('/aboutUs', [HomeController::class, 'showAboutUsPage']);

Route::get('/allProducts', [HomeController::class, 'allProducts']);

Route::resource('products', HomeController::class);
// Route::get('/allProducts/{id}', [HomeController::class, 'show']);

Route::get('/oneProduct', function () {
    return view('product');
});

Route::get('/faq', function () {
    return view('pages.faq');
});

Route::get('/privacyPolicy', function () {
    return view('pages.privacyPolicy');
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

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::middleware(['guest'])->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login'])->name('login.submit');

    Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [RegisterController::class, 'register'])->name('register.submit');
});

Route::middleware(['auth.user'])->group(function () {
    // User routes here
    Route::resource('cart', CartController::class);

    Route::post('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');

    Route::get('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');

    Route::get('cart/{id}/{quantity}', [CartController::class, 'update'])->name('cart.update');

    Route::post('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');

    Route::resource('checkout', CheckoutController::class);
    Route::get('/checkout/cities/{region}', [CheckoutController::class, 'getCitiesByRegion'])->name('checkout.getCitiesByRegion');
    Route::get('/checkout/townships/{city}', [CheckoutController::class, 'getTownships'])->name('checkout.getTownships');
    Route::post('/checkout/update-addresses', [CheckoutController::class, 'updateShippingAddress'])->name('checkout.update-addresses');

    Route::resource('address', AddressController::class);

    Route::resource('order', OrderController::class);
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

Route::resource('user', UserController::class);
// });

Route::prefix('admin')->middleware(['guest:admin'])->group(function () {
    Route::view('/login', 'auth.login', ['url' => 'admin']);
    Route::post('/login', [LoginController::class, 'login'])->name('admin.login');
});

Route::middleware(['auth:admin'])->group(function () {
    Route::resource('/admin/create', AdminController::class);
    // Route::post('/admin', 'Admin\AdminController@store')->name('admin.store');
});