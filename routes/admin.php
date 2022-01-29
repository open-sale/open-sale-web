<?php

namespace App\Http\Controllers\Admin;

use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['prefix' => 'admin', 'as' => 'admin.']
    , function () {
        Auth::routes();
});



Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'auth']
    , function () {
        Route::get('home', [HomeController::class, 'index'])->name('home');
        Route::resource('categories', CategoryController::class);
        Route::resource('products', ProductController::class);
        Route::resource('users', UserController::class);
        Route::resource('carts', CartController::class);
    }
);
