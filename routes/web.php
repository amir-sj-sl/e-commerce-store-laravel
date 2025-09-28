<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminOrderController;
use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Middleware\IsAdminMiddleware;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/* Route::get('test', function() {
    // return new OrderPlaced();
    Mail::to('amirkhomo@gmail.com')->send(
        new OrderPlaced
    );

    return 'done';
}); */

/* Route::get('/', function () {
    return view('index');
}); */

Route::get('/', [HomeController::class, 'show'])->name('index');

Route::middleware(['auth', IsAdminMiddleware::class])->prefix('admin')->name('admin.')->group(function () {

    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

    Route::get('/products', [AdminProductController::class, 'index'])->name('products'); 
    Route::get('/products/add', [AdminProductController::class, 'add'])->name('product.add'); 
    Route::post('/products', [AdminProductController::class, 'store'])->name('product.store'); 
    Route::get('/products/{id}/edit', [AdminProductController::class, 'edit'])->name('product.edit'); 
    Route::patch('/products/{id}', [AdminProductController::class, 'update'])->name('product.update'); 
    Route::get('/products/{id}', [AdminProductController::class, 'show'])->name('product.show'); 
    Route::delete('/products/{id}', [AdminProductController::class, 'destroy'])->name('product.destroy'); 
    Route::patch('/products/{id}/active', [AdminProductController::class, 'active'])->name('product.active'); 

    Route::get('/categories', [AdminCategoryController::class, 'index'])->name('categories'); 
    Route::get('/categories/add', [AdminCategoryController::class, 'add'])->name('category.add'); 
    Route::post('/categories', [AdminCategoryController::class, 'store'])->name('category.store'); 
    Route::get('/categories/{id}/edit', [AdminCategoryController::class, 'edit'])->name('category.edit'); 
    Route::patch('/categories/{id}', [AdminCategoryController::class, 'update'])->name('category.update'); 
    Route::get('/categories/{id}', [AdminCategoryController::class, 'show'])->name('category.show'); 
    Route::delete('/categories/{id}', [AdminCategoryController::class, 'destroy'])->name('category.destroy'); 
    Route::patch('/categories/{id}/active', [AdminCategoryController::class, 'active'])->name('category.active'); 

    Route::get('orders', [AdminOrderController::class, 'index'])->name('orders');
    Route::get('/orders/{id}', [AdminOrderController::class, 'show'])->name('order.show');
    Route::patch('/orders/{id}/complete', [AdminOrderController::class, 'complete'])->name('order.complete');

    Route::get('users', [AdminUserController::class, 'index'])->name('users');
    Route::get('/users/{id}', [AdminUserController::class, 'show'])->name('user.show');

});

Route::get('/dashboard', function () {
    $user = Auth::user();
    return view('dashboard', ['user' => $user]);
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile/{id}orders', [OrderController::class, 'show'])->name('profile.orders');
    //Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    //Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/products/{product}', [ProductController::class, 'show'])->name('product.show');
Route::get('/products', [ProductController::class, 'index'])->name('product.index');
Route::get('/search', [ProductController::class, 'search'])->name('products.search');

Route::get('/categories/{category}', [CategoryController::class, 'show'])->name('category.show');
Route::get('/categories', [CategoryController::class, 'index'])->name('category.index');

Route::middleware(['auth'])->group(function () {
    Route::get('/cart', [CartController::class, 'show'])->name('cart');
    Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
    Route::patch('/cart/update/{id}', [CartController::class, 'update'])->name('cart.update');
    Route::delete('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
});

Route::middleware('auth')->group(function () {
    Route::get('/checkout', [CheckoutController::class, 'show'])->name('checkout.show');
    Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.store');
});


require __DIR__.'/auth.php';
