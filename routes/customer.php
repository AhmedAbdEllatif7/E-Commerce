<?php

use App\Http\Controllers\Customer\Address\CustomerAdderssController;
use App\Http\Controllers\Customer\Cart\ShowOrderController;
use App\Http\Controllers\Customer\Category\CategoryController;
use App\Http\Controllers\Customer\Dashboard\DashboardCustomerController;
use App\Http\Controllers\Customer\Product\ProductController;
use App\Http\Controllers\Customer\Wishlist\WishlistController;
use App\Http\Controllers\Order\CustomerOrderController;
use App\Http\Controllers\Payment\PayPalController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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



Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){

########################################### Customer #####################################
    Route::resource('/customer/dashboard',DashboardCustomerController::class)->middleware('auth:customer', 'verified');
    Route::get('/customer/category/{id}',[CategoryController::class , 'show'])->name('customer.category.show');
    Route::get('/customer/category/',[CategoryController::class , 'showAll'])->name('customer.category.showAll');
    Route::get('/customer/category-filter/',[CategoryController::class , 'filterProducts'])->name('customer.category.filter');

    /* Products */
    Route::controller(ProductController::class)->group(function () {
        Route::get('/customer/product/filter-price' , 'filterByPrice')->name('customer.product.filter.price');
        Route::get('/customer/product/filter-product-price' , 'filterProducts')->name('customer.product.filterProducts');
        Route::get('/customer/product/{id}', 'show')->name('customer.product.show');
        Route::get('/customer/product/','showAll')->name('customer.product.showAll');
        Route::get('/search', 'search')->name('products.search');

    });


    Route::resource('/orders',CustomerOrderController::class)->middleware('auth:customer');
    Route::resource('/show-cart',ShowOrderController::class)->middleware('auth:customer');
    Route::resource('/customer_address',CustomerAdderssController::class);

    /* Payment */
    Route::controller(PayPalController::class)->group(function () {
        Route::get('payment' , 'payment')->name('payment');
        Route::get('payment/cancel' , 'cancel')->name('cancel');
        Route::get('payment/success' , 'success')->name('success');
    });


    /* Add To Favourite */
    Route::controller(WishlistController::class )->group(function () {
        Route::get('/show-wishlist' , 'showWishlist')->name('show.wishlist');
        Route::post('/add-to-wishlist',  'addToWishlist')->name('wishlist.add');
        Route::delete('/delete-item/{itemId}',   'deleteItem')->name('delete.item');
    });



});


