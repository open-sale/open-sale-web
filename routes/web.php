<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
    return view('website.home.index');
})->name('home');

Route::get('/categories', function () {
    return view('website.categories.index', ['categories' => \App\Models\Category::get()]);
})->name('categories');

Route::get('/categories/{id}', function ($id = 1) {
    return view('website.products.index', ['products' => \App\Models\Product::where('category_id', $id)->get()]);
})->name('category.product');

Route::get('/shop', function () {
    return view('website.products.index', ['products' => \App\Models\Product::get()]);
})->name('shop');

Route::get('/contact', function () {
    return view('website.contact.index');
})->name('contact');

Route::get('/about', function () {
    return view('website.about.index');
})->name('about');

Route::get('/welcome', function () {
    return view('welcome');
});
