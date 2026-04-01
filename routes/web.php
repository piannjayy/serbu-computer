<?php

use Illuminate\Support\Facades\Route;
use Spatie\Sitemap\SitemapGenerator;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;

// ================= AUTH =================
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

// ================= PUBLIC =================
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ProductUserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShopController;

// ================= USER =================
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\RiwayatController;
use App\Http\Controllers\WishlistController;

// ================= ADMIN =================
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\UserController;

/*
|--------------------------------------------------------------------------
| HOME (GUEST & LOGIN)
|--------------------------------------------------------------------------
*/
Route::get('/', [PagesController::class, 'home'])->name('home');

/*
|--------------------------------------------------------------------------
| AUTH PENGGUNA
|--------------------------------------------------------------------------
*/
Route::middleware('guest')->group(function () {

    // Login Pengguna
    Route::get('/login', fn () => view('auth.login'))
        ->name('login');

    Route::post('/login', [LoginController::class, 'loginUser'])
        ->name('login.user');

    // Register
    Route::get('/register', fn () => view('auth.register'))
        ->name('register');

    Route::post('/register', [RegisterController::class, 'register']);
});


/*
|--------------------------------------------------------------------------
| AUTH ADMIN (CUSTOM URL FOR SECURITY)
|--------------------------------------------------------------------------
*/
Route::middleware(['guest', 'throttle:10,1']) 
    ->group(function () {

        Route::get('/serbu-secret-admin', fn () => view('admin.auth.login'))
            ->name('admin.login');

        Route::post('/serbu-secret-admin', [LoginController::class, 'loginAdmin'])
            ->name('admin.login.submit');
});

/*
|--------------------------------------------------------------------------
| LOGOUT
|--------------------------------------------------------------------------
*/
Route::post('/logout', [LoginController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');

/*
|--------------------------------------------------------------------------
| PUBLIC PAGES (GUEST & USER)
|--------------------------------------------------------------------------
*/
Route::get('/about', [PagesController::class, 'about'])
    ->name('pages.about');

/*
|--------------------------------------------------------------------------
| PRODUCT (GUEST & USER)
|--------------------------------------------------------------------------
*/
Route::get('/products', [ProductUserController::class, 'index'])
    ->name('shop.index');

Route::get('/products/{product}', [ProductUserController::class, 'show'])
    ->name('shop.show');

/*
|--------------------------------------------------------------------------
| SHOP SEARCH
|--------------------------------------------------------------------------
*/
Route::get('/shop/search', [ShopController::class, 'searchPage'])
    ->name('shop.search.page');

Route::get('/shop/search/results', [ShopController::class, 'search'])
    ->name('shop.search.results');

/*
|--------------------------------------------------------------------------
| GLOBAL SEARCH
|--------------------------------------------------------------------------
*/
Route::get('/search', [ProductController::class, 'searchPage'])
    ->name('search.page');

Route::get('/search/results', [ProductController::class, 'search'])
    ->name('search.results');

/*
|--------------------------------------------------------------------------
| USER LOGIN (PENGGUNA)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'pengguna'])->group(function () {

    // Dashboard & Profile
    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::post('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    // Checkout
    Route::get('/checkout/{product}', [CheckoutController::class, 'show'])->name('checkout.show');
    Route::post('/checkout/{product}', [CheckoutController::class, 'store'])->name('checkout.store');

// Riwayat
Route::get('/riwayat', [RiwayatController::class, 'index'])->name('riwayat.index');

// Batalkan pesanan (ganti hapus)
Route::post('/riwayat/{order}/cancel', [RiwayatController::class, 'cancel'])->name('riwayat.cancel');

Route::post('/riwayat/simulate-expired', [RiwayatController::class, 'simulateExpired'])
    ->name('riwayat.simulate');


    // ================= WISHLIST =================
    // Toggle wishlist (add/remove)
    Route::post('/wishlist/{product}', [WishlistController::class, 'toggle'])
        ->name('wishlist.toggle');

    // Lihat wishlist user
    Route::get('/favorite', [WishlistController::class, 'index'])
        ->name('wishlist.index');

});

/*
|--------------------------------------------------------------------------
| ADMIN
|--------------------------------------------------------------------------
*/
Route::middleware(['admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::get('/dashboard', [AdminDashboardController::class, 'index'])
            ->name('dashboard');

        Route::resource('products', AdminProductController::class);

        Route::get('/orders', [OrderController::class, 'index'])
            ->name('orders.index');

        Route::post('/orders/{order}/status', [OrderController::class, 'updateStatus'])
            ->name('orders.status');

            Route::get('/orders/create', [OrderController::class, 'create'])
    ->name('orders.create');

Route::post('/orders', [OrderController::class, 'store'])
    ->name('orders.store');

        Route::get('/users', [UserController::class, 'index'])
            ->name('users.index');

        Route::delete('/users/{user}', [UserController::class, 'destroy'])
            ->name('users.destroy');

        Route::get('/', [PagesController::class, 'home'])->name('home');

        Route::post('users/{user}/toggle-ban', [UserController::class, 'toggleBan'])
    ->name('users.toggleBan'); // otomatis jadi admin.users.toggleBan


});