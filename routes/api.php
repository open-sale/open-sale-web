<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['middleware' => 'auth:sanctum'], function(){
    //All secure URL's
    Route::apiResource('/category', 'CategoryController');//->only(['index', 'show']);
    Route::apiResource('/product', 'ProductController')->only(['index', 'show']);
    Route::post('logout',[UserController::class,'logout']);
});

Route::controller('UserController')->group(function() {
    Route::get('/login','visitor')->name('login');
    Route::post('/login','login');
});

Route::apiResource('/user', 'UserController');//->only(['index', 'show']);
