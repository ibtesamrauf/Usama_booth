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

Route::get('/', 'WelcomeController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/add_product_view', 'HomeController@add_product_view');
Route::post('/add_product', 'HomeController@add_product');

Route::get('/show_product_view/{product_id}', 'HomeController@show_product_view');

// Route::get('/show_cart_view', 'HomeController@show_cart_view');

Route::resource('show_cart_view', 'Show_cart_viewController');


Route::get('/add_to_cart/{add_to_cart_id}/{add_to_cart_product_name}/{add_to_cart_product_price}', 'HomeController@add_to_cart');

// Route::get('/add_to_cart', function () {
// 	// Cart::instance('shopping')->destroy();
//     Cart::instance('shopping')->add('192ao1ss', 'Product new', 1, 10.00);
//     // return view('welcome');
// });

