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
Route::resource('products', 'Api\ProductController')->except(['store', 'update', 'delete']);
Route::resource('categories', 'Api\CategoryController')->except(['store', 'update', 'delete']);

Route::group(['middleware' => 'admin'], function(){
    Route::resource('products', "Api\ProductController")->except(['index', 'edit']);
    Route::resource('categories', "Api\CategoryController")->except(['index', 'edit']);
});

