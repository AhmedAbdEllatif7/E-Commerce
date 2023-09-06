<?php

use App\Http\Controllers\Address\CityController;
use App\Http\Controllers\Address\CountryController;
use App\Http\Controllers\Address\StateController;
use App\Http\Controllers\Admin\Category\CategoryController;
use App\Http\Controllers\Admin\Customer\CustomerAddressController;
use App\Http\Controllers\Admin\Customer\CustomerController;
use App\Http\Controllers\Admin\Order\OrderController;
use App\Http\Controllers\Admin\Product\ProductController;
use App\Http\Controllers\Customer\Address\CustomerAdderssController;
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


Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' , 'auth' ]
    ], function(){

    Route::resource('/customer',CustomerController::class);
    Route::resource('/category',CategoryController::class);
    Route::resource('/product',ProductController::class);
    Route::resource('/country',CountryController::class);
    Route::resource('/cities',CityController::class);
    Route::resource('/states',StateController::class);
    Route::resource('/admin-orders',OrderController::class);
    Route::get('/admin-customer-address/{id}',[CustomerAddressController::class , 'show'])->name('show.address');


});


