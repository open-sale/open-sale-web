<?php

namespace App\Http\ApiControllersV1;

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes;
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::controller(UserController::class)->group(function () {
    Route::post('/register', 'register');
    Route::get('/login','visitor')->name('login'); // redirect to if not authenticated
    Route::post('/login', 'login');
});

//All secure URL's
Route::group(['middleware' => 'auth:sanctum'], function () {

    Route::controller(UserController::class)->group(function () {
        Route::get('/profile', 'profile');
        Route::put('/profile', 'update');
        Route::post('/logout', 'logout');
        Route::post('/logout-all-devices', 'logoutAll');
    });

    Route::apiResource('/order', OrderController::class)->only(['store', 'destroy']);

    Route::bind('cart', [CartController::class, 'bind']);
    Route::apiResource('/cart', CartController::class)->except(['store', 'destroy']);
});

Route::apiResource('/category', CategoryController::class)->only(['index', 'show']);
Route::apiResource('/product', ProductController::class)->only(['index', 'show']);
