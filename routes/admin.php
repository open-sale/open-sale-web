<?php

namespace App\Http\Controllers\Admin;

use App\Http\Middleware\AdminMiddleware;
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


Route::controller(UserController::class)->group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::post('/register', 'register');
    Route::get('/login', 'visitor')->name('login'); // redirect to if not authenticated
    Route::post('/login', 'login');
});

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => AdminMiddleware::class]
    , function () {
    Route::resource('categories', CategoryController::class);
});
