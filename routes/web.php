<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\AIController;

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CakeController;
use App\Http\Controllers\Admin\DashboardController;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/cake/{cake}', [CakeController::class, 'show'])
    ->name('cakes.show');

Route::get('/ai', [AIController::class, 'index'])
    ->name('ai.index');

Route::post('/ai/ask', [AIController::class, 'ask'])
    ->name('ai.ask');
Route::get('/cakes', [HomeController::class, 'cakes'])
    ->name('cakes.index');
    Route::get('/categories', [HomeController::class, 'categories'])
    ->name('categories.list');
/*
|--------------------------------------------------------------------------
| Dashboard
|--------------------------------------------------------------------------
*/

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

/*
|--------------------------------------------------------------------------
| Authenticated User Routes
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Cart
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');

    Route::post('/cart/add/{cake}', [CartController::class, 'add'])->name('cart.add');

    Route::delete('/cart/remove/{cart}', [CartController::class, 'remove'])->name('cart.remove');

    // Wishlist
    Route::get('/wishlist', [WishlistController::class, 'index'])->name('wishlist.index');

    Route::post('/wishlist/add/{cake}', [WishlistController::class, 'add'])->name('wishlist.add');

    Route::delete('/wishlist/remove/{wishlist}', [WishlistController::class, 'remove'])->name('wishlist.remove');

    // Checkout
    Route::get('/checkout', [OrderController::class, 'checkout'])
        ->name('checkout');

    Route::post('/place-order', [OrderController::class, 'store'])
        ->name('orders.store');

    Route::get('/order-success', function () {
        return view('order-success');
    })->name('orders.success');
    Route::post('/payment-success',
    [OrderController::class,'paymentSuccess'])
    ->name('payment.success');

    // My Orders
    Route::get('/my-orders', [OrderController::class, 'index'])
        ->name('orders.index');

    // Reviews
    Route::post('/reviews/{cake}', [ReviewController::class, 'store'])
        ->name('reviews.store');

    Route::delete('/reviews/{review}', [ReviewController::class, 'destroy'])
        ->name('reviews.destroy');
});

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'admin'])->group(function () {

    Route::get('/admin/dashboard', [DashboardController::class, 'index'])
        ->name('admin.dashboard');

    Route::resource('admin/categories', CategoryController::class);

    Route::resource('admin/cakes', CakeController::class);

    Route::get('/admin/orders', [OrderController::class, 'adminIndex'])
        ->name('admin.orders');

    Route::put('/admin/orders/{order}', [OrderController::class, 'updateStatus'])
        ->name('admin.orders.update');

    Route::get('/admin/reviews', [ReviewController::class, 'adminIndex'])
        ->name('admin.reviews');
   
  

});
require __DIR__.'/auth.php';
