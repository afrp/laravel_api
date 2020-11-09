<?php

use Illuminate\Http\Request;
//use App\Book;
//use App\Http\Resources\Book as BookResource;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user(); });

Route::get('/book', function () {
        return new BookResource(Book::find(1));
    });

Route::middleware('auth:api')->get('/user', function (Request $request) {
        return $request->user();
    });

Route::prefix('v1')->group(function () { 
    Route::get('books', 'BookController@index');
    Route::get('buku/{judul}', 'BookController@cetak');
    Route::get('book/{id}', 'BookController@view')->where('id', '[0-9]+');

    Route::post('login', 'AuthController@login');
    Route::post('register', 'AuthController@register');

    Route::middleware('auth:api')->group(function () {
        Route::post('logout', 'AuthController@logout');
        //...
    });
});*/

Route::prefix('v1')->group(function () { 
    // public
    Route::post('login', 'AuthController@login');
    Route::post('register', 'AuthController@register');
    Route::get('categories', 'CategoryController@index');
    Route::get('categories/random/{count}', 'CategoryController@random');
    Route::get('categories/slug/{slug}', 'CategoryController@slug');
    Route::get('books', 'BookController@index');
    Route::get('books/top/{count}', 'BookController@top');
    Route::get('books/slug/{slug}', 'BookController@slug');
    Route::get('books/search/{keyword}', 'BookController@search');
    Route::post('books/cart', 'BookController@cart');
    Route::get('provinces', 'ShopController@provinces');
    Route::get('cities', 'ShopController@cities');
    Route::get('couriers', 'ShopController@couriers');
    // auth
    Route::middleware(['auth:api'])->group(function () {
        Route::post('logout', 'AuthController@logout');
        Route::post('shipping', 'ShopController@shipping');
        Route::post('services', 'ShopController@services');
        Route::post('payment', 'ShopController@payment');
        Route::get('my-order', 'ShopController@myOrder');
        //...
    }); 
});