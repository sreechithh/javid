<?php

use Illuminate\Support\Facades\Route;

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

Route::post('login', "Api\AdminController@login");
Route::get('products', 'Api\ProductController@index')->name('products');
Route::get('categories', 'Api\CategoryController@index')->name('categories');

Route::group(['middleware' => 'admin'], function(){
    Route::resource('products', "Api\ProductController")->except('index');
    Route::resource('categories', "Api\CategoryController")->except('index');
});

