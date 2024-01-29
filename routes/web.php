<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Dashboards\Admin\AdminDashboardController;
use App\Http\Controllers\Home\HomeController;
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



// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });


// Login
    Route::group(['namespace' => 'Auth'], function () {

        Route::get('/login/{type}', [AuthController::class, 'loginForm'])->middleware('guest')->name('login.show');
        Route::post('/login', [AuthController::class, 'login'])->name('login');
        Route::get('/register', [AuthController::class, 'registerForm'])->middleware('guest')->name('register.form');
        Route::post('/register', [AuthController::class, 'register'])->name('register');
        
        
        Route::get('/logout/{type}', [AuthController::class, 'logout'])->name('logout');
    });

    Route::get('/selection', [HomeController::class, 'selection'])->name('selection')->middleware('guest');


    ########################################### Admin #####################################
    Route::resource('/admin/dashboard', AdminDashboardController::class)->name('index', 'admin.dashboard')->middleware('auth', 'verified');
    Route::resource('/', HomeController::class)->name('index', 'home');

    // Route::get('payment', [PayPalController::class, 'payment'])->name('payment');
    // Route::get('payment/cancel', [PayPalController::class, 'cancel'])->name('cancel');
    // Route::get('payment/success', [PayPalController::class, 'success'])->name('success');

// require __DIR__.'/auth.php';
