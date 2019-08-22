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

Route::get('/', 'WebController@index')->name('web');
Route::get('/get-orders', 'WebController@orders')->name('orders');

/**
 * Cart Route
 */
Route::get('/cart/add/{id}', 'WebController@add_cart')->name('add-cart');
Route::get('/cart/view', 'WebController@view_cart')->name('view-cart');
Route::get('/cart/destroy', 'WebController@destroy_cart')->name('destroy-cart');
Route::get('/cart/remove/{rowId}', 'WebController@remove_cart')->name('remove-cart');
Route::post('/cart/update/{rowId}', 'WebController@update_cart')->name('update-cart');
Route::get('/cart/checkout', 'WebController@checkout_cart')->name('checkout-cart');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
