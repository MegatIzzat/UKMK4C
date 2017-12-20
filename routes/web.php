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

use Illuminate\Http\Request;

Auth::routes();

/*---------------------- CUSTOM LOGIN & REGISTER -------------------------------*/
Route::post('/login/custom', 'LoginController@login')->name('login.custom');

Route::group(['middleware' => ['auth','admin']], function(){
	Route::post('register','Auth\RegisterController@register');
	Route::get('register','Auth\RegisterController@showRegistrationForm')->name('register');
});

/*------------------------ CUSTOMER -------------------------------*/

Route::group(['prefix'=>'/','as'=>'cust.', 'name'=>'cust' ], function(){
	Route::get('/','CustomerController@index')->name('index');
	Route::get('/home','CustomerController@index')->name('home');

	/*--------------------------- CATEGORY & SORT ---------------------------*/
	Route::get('category/{id}','CustomerController@show')->name('category');
	Route::get('sort/price-low-to-high','CustomerController@pricelow')->name('pricelow');
	Route::get('sort/price-high-to-low','CustomerController@pricehigh')->name('pricehigh');
	Route::get('sort/rating-low-to-high','CustomerController@ratinghigh')->name('ratinghigh');
	
	
	/*---------------------------------- CART --------------------------------*/
	Route::get('add-to-cart/{product_id}', 'CustomerController@AddToCart')->name('addcart');
	Route::get('/cart', 'CustomerController@getCart')->name('getcart');
	Route::get('add/{id}','CustomerController@getAddByOne')->name('addByOne');
	Route::get('reduce/{id}','CustomerController@getReduceByOne')->name('reduceByOne');
	Route::get('remove/{id}','CustomerController@getRemoveItem')->name('remove');

	/*----------------------------- AUTHENTICATE --------------------------*/
	Route::group(['middleware' => 'auth'], function(){
		Route::get('checkout/{user}', 'CustomerController@checkout')->name('checkout');
		Route::put('isNotified/{id}','NotifyController@isNotified')->name('isNotified');
		Route::put('isNotifiedAll/{id}','NotifyController@isNotifiedAll')->name('isNotifiedAll');

		Route::group(['prefix'=>'profile', 'name'=>'profile', 'as'=>'profile.'], function(){
			Route::get('create', 'ProfileController@create')->name('create');
			Route::post('store', 'ProfileController@store')->name('store');
			Route::get('edit/{id}', 'ProfileController@edit')->name('edit');
			Route::get('','ProfileController@index')->name('index');
			Route::get('show/{user}', 'ProfileController@show')->name('show');
			Route::put('update/{user}','ProfileController@update')->name('update');
		});

		Route::group(['prefix'=>'orderhistory'], function(){
			Route::get('', 'CustomerController@orderHistory')->name('orderHistory');
			Route::put('sendFeedback/{id}','CustomerController@sendFeedback')->name('sendFeedback');
			Route::post('{order_id}/{product_id}', 'CustomerController@sendRating')->name('sendRating');
		});

	});
});

/*---------------------- ADMIN ----------------------------*/

Route::group(['prefix'=>'staff', 'as'=>'staff.', 'middleware' => ['auth','admin'], 'name'=>'staff' ], function(){
	Route::get('/', 'OrderController@index')->name('index');
	Route::get('register','Auth\StaffRegisterController@showRegistrationForm')->name('register');
	Route::post('register','Auth\StaffRegisterController@register');
	Route::get('viewfeedback',  'StaffController@viewFeedback')->name('viewfeedback');
	Route::get('report',  'StaffController@report')->name('report');
	Route::get('customerlist','ListController@customerlist')->name('customerlist');
	Route::get('stafflist','ListController@stafflist')->name('stafflist');
	Route::get('orderlist','ListController@orderlist')->name('orderlist'); 

	/*------------------------------------ CATEGORY ----------------------------------*/
	Route::group(['prefix'=>'category','as'=>'category.','name'=>'category'],function(){
		Route::get('/','StaffController@catindex')->name('index');
		Route::get('create', function(){
			return view('staff.category.create');
		})->name('create');
		Route::post('store','StaffController@store')->name('store');
		Route::get('{id}','StaffController@edit')->name('edit');
		Route::put('update/{id}','StaffController@update')->name('update');
		Route::delete('delete/{id}','StaffController@delete')->name('delete');
	});

	/*------------------------------------ ADVERTISEMENT ----------------------------------*/
	Route::group(['prefix' => 'advertisement', 'as'=>'advertisement.','name'=>'advertisement'], function(){
		Route::get('/','AdverController@index')->name('index');
		Route::get('create', 'AdverController@create')->name('create');
		Route::post('store', 'AdverController@store')->name('store');
		Route::get('{id}', 'AdverController@edit')->name('edit');
		Route::put('update/{id}','AdverController@update')->name('update');
		Route::delete('delete/{id}', 'AdverController@destroy')->name('delete');
	});

	/*------------------------------------ PRODUCT MANAGEMENT ----------------------------------*/
	Route::group(['prefix' => 'product','as'=>'product.','name'=>'product'],function(){
		/*----------- biasa----------------*/
		Route::get('/', 'ProductController@index')->name('index');
		Route::get('create', 'ProductController@create')->name('create');
		Route::post('store', 'ProductController@store')->name('store');
		Route::get('{id}', 'ProductController@edit')->name('edit');
		Route::put('update/{id}','ProductController@update')->name('update');
		Route::delete('delete/{id}', 'ProductController@destroy')->name('delete');
	});

	/*------------------------------------ ORDER MANAGEMENT ----------------------------------*/
	Route::group(['prefix'=>'order', 'name'=>'order', 'as'=>'order.' ], function(){
		Route::get('/', 'OrderController@index')->name('index');
		Route::get('update/{id}/{cust}','OrderController@update')->name('update');
	});

	/*------------------------------------ TOPUP ----------------------------------*/
	Route::group(['prefix'=>'topup', 'as' => 'topup.', 'name' => 'topup'], function(){
		Route::get('/', 'TopupController@index')->name('index');
		Route::post('update', 'TopupController@update')->name('update');
	});
});

/*--------------------------------------------------------------------------------------------*/



