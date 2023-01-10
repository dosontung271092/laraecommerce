<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

// Authentication
Auth::routes();

// Public
Route::prefix('/')->group(function (){
    Route::controller(App\Http\Controllers\Public\HomeController::class)->group(function () {
        Route::get('/', 'index');
        Route::get('/map', 'map');
    });

    Route::get('category', [App\Http\Controllers\Public\CategoryController::class, 'index']);

    Route::prefix('product')->controller(App\Http\Controllers\Public\ProductController::class)->group(function (){
        Route::get('/{category}', 'index');
        Route::post('/search', 'search');
        Route::get('/{category}/{slug}', 'detail');
    });

    Route::get('taxonomy', [App\Http\Controllers\Public\TaxonomyController::class, 'index']);

    Route::prefix('post')->controller(App\Http\Controllers\Public\PostController::class)->group(function (){
        Route::get('/{taxonomy}', 'index');
        Route::get('/{taxonomy}/{slug}', 'detail');
    });

    Route::prefix('cart')->controller(App\Http\Controllers\Public\CartController::class)->group(function (){
        Route::post('/store', 'store');
    });

});

// Admin
Route::prefix('admin')->middleware(['auth', 'isAmin'])->group(function (){
    
    Route::get('dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index']);

    Route::controller(App\Http\Controllers\Admin\CategoryController::class)->group(function () {
        Route::get('/category', 'index');
        Route::get('/category/create', 'create');
        Route::post('/category', 'store');
        Route::get('/category/{category}', 'edit');
        Route::put('/category/{category}', 'update');
    });

    Route::controller(App\Http\Controllers\Admin\BrandController::class)->group(function () {
        Route::get('/brand', 'index');
    });

    Route::controller(App\Http\Controllers\Admin\ProductController::class)->group(function () {
        Route::get('/product', 'index');
        Route::get('/product/create', 'create');
        Route::post('/product', 'store');
        Route::get('/product/{product}', 'edit');
        Route::put('/product/{product}', 'update');
        Route::get('/product/{id}/delete', 'delete');
    });

    Route::controller(App\Http\Controllers\Admin\TaxonomyController::class)->group(function () {
        Route::get('/taxonomy', 'index');
        Route::get('/taxonomy/create', 'create');
        Route::post('/taxonomy', 'store');
        Route::get('/taxonomy/{taxonomy}', 'edit');
        Route::put('/taxonomy/{taxonomy}', 'update');
        Route::get('/taxonomy/{id}/delete', 'delete');
    });

    Route::controller(App\Http\Controllers\Admin\PostController::class)->group(function () {
        Route::get('/post', 'index');
        Route::get('/post/create', 'create');
        Route::post('/post', 'store');
        Route::get('/post/{post}', 'edit');
        Route::put('/post/{post}', 'update');
        Route::get('/post/{id}/delete', 'delete');
    });

    Route::controller(App\Http\Controllers\Admin\ProimgController::class)->group(function () {
        Route::get('/proimg/{id}', 'delete');
    });

    Route::controller(App\Http\Controllers\Admin\ColorController::class)->group(function () {
        Route::get('/color', 'index');
        Route::get('/color/create', 'create');
        Route::post('/color', 'store');
        Route::get('/color/{color}', 'edit');
        Route::put('/color/{id}', 'update');
        Route::get('/color/{id}/delete', 'delete');
    });

    Route::controller(App\Http\Controllers\Admin\SliderController::class)->group(function () {
        Route::get('/slider', 'index');
        Route::get('/slider/create', 'create');
        Route::post('/slider', 'store');
        Route::get('/slider/{slider}', 'edit');
        Route::put('/slider/{slider}', 'update');
        Route::get('/slider/{slider}/delete', 'delete');
    });

});

