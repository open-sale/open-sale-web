<?php

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
    Route::post('logout',[UserController::class,'logout']);

    // TODO: add profile,
    Route::apiResource('/user', 'UserController');//->only(['index', 'show']);
    // TODO: add orders [cart contents]
    // TODO: add carts
    // TODO: add previous carts
});

Route::post('/login',[UserController::class,'login']);
Route::post('/register',[UserController::class,'store']);

Route::apiResource('/category', 'CategoryController');//->only(['index', 'show']);
Route::apiResource('/product', 'ProductController')->only(['index', 'show']);
