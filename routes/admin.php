<?php
use App\Http\Controllers\Dashboards\Admin\Category\CategoryController;
use App\Http\Controllers\Dashboards\Admin\Customer\CustomerController;
use App\Http\Controllers\Dashboards\Admin\customerAddress\CustomerAddressController;
use App\Http\Controllers\Dashboards\Admin\Notification\NotificationController;
use App\Http\Controllers\Dashboards\Admin\Order\OrderController;
use App\Http\Controllers\Dashboards\Admin\Product\ProductController;
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


Route::group(
    [
        'middleware' => ['auth' ]
    ], function(){



    Route::resource('/category', CategoryController::class);
    Route::resource('/products', ProductController::class);
    Route::resource('/customers', CustomerController::class);
    Route::resource('/admin-orders', OrderController::class)->except(['store', 'show']);
    Route::get('/admin-customer-address/{id}', [CustomerAddressController::class , 'show'])->name('show.address');

    Route::get('read/notification/{id}' , [NotificationController::class , 'readNotification'])->name('read.notification');
    Route::get('read/all/notifications' , [NotificationController::class , 'readAllNotification'])->name('read.all.notification');
    Route::post('delete/read/notifications' , [NotificationController::class , 'deleteReadNotification'])->name('delete.read.notifications');
});


