<?php

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

Route::get('/', 'ProductController@index')->name('products.index');
Route::post('products', 'ProductController@store')->name('products.store');
Route::delete('products/{product}', 'ProductController@destroy')->name('products.destroy');
Route::get('products/{product}/edit', 'ProductController@edit')->name('products.edit');
Route::put('products/{product}', 'ProductController@update')->name('products.update');


// Route::resource('products', 'ProductController');
