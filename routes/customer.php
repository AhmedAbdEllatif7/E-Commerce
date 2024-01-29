<?php

use App\Http\Controllers\Dashboards\Customer\Address\CustomerAdderssController;
use App\Http\Controllers\Dashboards\Customer\Cart\ShowOrderController;
use App\Http\Controllers\Dashboards\Customer\Category\CategoryController;
use App\Http\Controllers\Dashboards\Customer\CustomerDashboardController;
use App\Http\Controllers\Dashboards\Customer\Product\ProductController;
use App\Http\Controllers\Dashboards\Customer\Wishlist\WishlistController;
use App\Http\Controllers\Dashboards\Customer\Order\CustomerOrderController;
use App\Http\Controllers\Payment\PaymentController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Customer Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


########################################### Customer #####################################
    Route::resource('/customer/dashboard', CustomerDashboardController::class)->middleware('auth:customer', 'verified');
    Route::get('/customer/category/{id}',[CategoryController::class , 'show'])->name('customer.category.show');
    Route::get('/customer/category/',[CategoryController::class , 'showAll'])->name('customer.category.showAll');
    Route::get('/customer/category-filter/',[CategoryController::class , 'filterProducts'])->name('customer.category.filter');

    /* Products */
    Route::controller(ProductController::class)->group(function () {
        Route::get('/customer/product/filter-price', 'filterByPrice')->name('customer.product.filter.price');
        Route::get('/customer/product/filter-product-price', 'filterProducts')->name('customer.product.filterProducts');
        Route::get('/customer/product/{id}', 'show')->name('customer.product.show');
        Route::get('/customer/product/','showAll')->name('customer.product.showAll');
        Route::get('/search', 'search')->name('products.search');
    });


    Route::resource('/orders',CustomerOrderController::class)->middleware('auth:customer');
    Route::resource('/show-cart',ShowOrderController::class)->middleware('auth:customer');
    Route::resource('/customer-address',CustomerAdderssController::class);

    /* Payment */
    Route::group(['middleware' => 'auth:customer'], function () {
        Route::get('payment', [PaymentController::class, 'payment'])->name('payment');
        Route::get('payment/cancel', [PaymentController::class, 'cancel'])->name('cancel');
        Route::get('payment/success', [PaymentController::class, 'success'])->name('success');
    });


    /* Add To Favourite */
    Route::controller(WishlistController::class )->group(function () {
        Route::get('/show-wishlist' , 'showWishlist')->name('show.wishlist');
        Route::post('/add-to-wishlist',  'addToWishlist')->name('wishlist.add');
        Route::delete('/delete-item/{itemId}',   'deleteItem')->name('delete.item');
    });



