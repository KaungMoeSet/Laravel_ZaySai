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
use App\Http\Controllers\PaymentConfirmController;
use App\Http\Controllers\PaymentMethodController;
use App\Models\Category;
use App\Models\PaymentConfirm;

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

Route::get('/contactUs', [HomeController::class, 'showContactUsPage']);

Route::get('/aboutUs', [HomeController::class, 'showAboutUsPage']);

Route::get('/allProducts', [HomeController::class, 'allProducts'])->name('allProducts');

Route::resource('products', HomeController::class);

Route::get('/oneProduct', function () {
    $categories = Category::all();
    return view('product', compact('categories'));
});

Route::get('/faq', function () {
    $categories = Category::all();
    return view('pages.faq', compact('categories'));
});

Route::get('/privacyPolicy', function () {
    $categories = Category::all();
    return view('pages.privacyPolicy', compact('categories'));
});

Route::get('/trackOrder', function () {
    return view('pages.trackOrder');
});

Route::get('/orderConfirmed', function () {
    $categories = Category::all();
    return view('customer.orderConfirmed', compact('categories'));
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
    Route::get('/checkout/{checkout}', [CheckoutController::class, 'show'])->name('checkout.show');
    Route::get('/checkout/cities/{region}', [CheckoutController::class, 'getCitiesByRegion'])->name('checkout.getCitiesByRegion');
    Route::get('/checkout/townships/{city}', [CheckoutController::class, 'getTownships'])->name('checkout.getTownships');
    Route::post('/checkout/update-addresses', [CheckoutController::class, 'updateShippingAddress'])->name('checkout.update-addresses');

    Route::resource('address', AddressController::class);

    Route::resource('order', OrderController::class);

    Route::resource('profile', UserController::class);

    Route::get('profileData', [UserController::class, 'profileData'])->name('profile.profileData');

    Route::get('addressBook', [UserController::class, 'addressBook'])->name('profile.addressBook');

    Route::get('all-orders', [UserController::class, 'getAllOrders'])->name('profile.getAllOrders');

    Route::get('/profile', [UserController::class, 'showMyProfile']);

});

Route::prefix('admin')->middleware(['guest:admin'])->group(function () {
    Route::view('/login', 'auth.login', ['url' => 'admin']);
    Route::post('/login', [LoginController::class, 'login'])->name('admin.login');
});

Route::middleware(['auth.admin'])->group(function () {

    Route::resource('admin', AdminController::class);

    Route::get('/show-all-admins', [AdminController::class, 'showAllAdmins'])->name('admin.show-all-admins');

    Route::get('/filter-by-date', [AdminController::class, 'filterByDate'])->name('admin.filterByDate');

    Route::resource('user', UserController::class);

    Route::resource('product', ProductController::class);

    Route::get('/get-subCategoires/{id}', [ProductController::class, 'getSubCategories']);
    Route::resource('productImage', ProductImageController::class);
    Route::resource('subCategory', SubCategoryController::class);
    Route::resource('category', CategoryController::class);

    Route::resource('paymentMethod', PaymentMethodController::class);
    Route::resource('heroCarousel', HeroCarouselController::class);

    Route::resource('adminOrders', OrderController::class);

    Route::get('adminOrders/deliver/{id}', [OrderController::class, 'deliver'])->name('adminOrders.deliver');

    Route::get('adminOrders/processing/{id}', [OrderController::class, 'processing'])->name('adminOrders.processing');

    Route::resource('paymentConfirm', PaymentConfirmController::class);

    Route::get('paymentConfirm/accept/{id}', [PaymentConfirmController::class, 'accept'])->name('paymentConfirm.accept');

    Route::get('paymentConfirm/reject/{id}', [PaymentConfirmController::class, 'reject'])->name('paymentConfirm.reject');
});
