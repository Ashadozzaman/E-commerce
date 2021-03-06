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


Route::group(['prefix'=>'admin','namespace'=>'Admin','middleware'=>'auth'],function(){
	Route::get('dashboard','DashboardController@dashboard')->name('admin.dashboard');
	Route::get('index','OrderController@index')->name('order.index');

	Route::resource('user','UserController');
	Route::resource('category','CategoryController');
	Route::resource('vandor','VandorController');
	Route::resource('product','ProductController');

});

Auth::routes([
  'register' => false, // Registration Routes...
  'reset' => false, // Password Reset Routes...
  'verify' => false, // Email Verification Routes...
]);

Route::get('home', 'HomeController@index')->name('home');
// crating route for front pages
Route::get('/', 'HomeController@home')->name('front.home');
Route::get('shop', 'HomeController@shop')->name('front.shop');
Route::get('_checkout','CheckoutController@cart')->name('_checkout');
Route::get('checkout_submit','CheckoutController@checkout')->name('checkout.submit');
Route::get('payment/{order_id?}','PaymentController@index')->name('payment.index');
Route::get('payment/{order_id}/init','PaymentController@paymentInit')->name('payment.init');



Route::get('{category_id}', 'HomeController@category')->name('category.product');