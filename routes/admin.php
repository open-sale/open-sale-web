<?php

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


Route::group([
    'prefix' => 'admin',
    // 'as' => 'admin.',
    'middleware' => \App\Http\Middleware\AdminMiddleware::class
], function () {
    Route::resource('categories', App\Http\Controllers\Admin\CategoryController::class, ["as" => 'admin']);
});
