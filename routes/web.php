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

/*------------------------ MANAGER -------------------------------*/

Route::group(['prefix'=>'/manager', 'middleware' => 'auth','as'=>'manager.', 'name'=>'manager' ], function(){
	Route::get('/','ManagerController@index')->name('index');
	Route::get('create', 'ManagerController@create')->name('create');
	Route::post('store', 'ManagerController@store')->name('store');
	Route::get('edit/{id}', 'ManagerController@edit')->name('edit');
	Route::put('update/{id}','ManagerController@update')->name('update');
	Route::delete('delete/{id}', 'ManagerController@destroy')->name('delete');
});

/*------------------------ STAFF -------------------------------*/

Route::group(['prefix'=>'/staff', 'middleware' => 'auth','as'=>'staff.', 'name'=>'staff' ], function(){
	Route::get('/','StaffController@index')->name('index');
	Route::get('create', 'StaffController@create')->name('create');
	Route::post('store', 'AStaffController@store')->name('store');
	Route::get('edit/{id}', 'StaffController@edit')->name('edit');
	Route::put('update/{id}','StaffController@update')->name('update');
	Route::delete('delete/{id}', 'StaffController@destroy')->name('delete');
});

/*------------------------ CUSTOMER -------------------------------*/

Route::group(['prefix'=>'/', 'middleware' => 'auth','as'=>'cust.', 'name'=>'cust' ], function(){
	Route::get('create', 'AdminController@create')->name('create');
	Route::post('store', 'AdminController@store')->name('store');
	Route::get('edit/{id}', 'AdminController@edit')->name('edit');
	Route::put('update/{id}','AdminController@update')->name('update');
	Route::delete('delete/{id}', 'AdminController@destroy')->name('delete');

});

/*------------------------ AUTH -------------------------------*/
Auth::routes();

/*------------------------ HOME -------------------------------*/
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/','CustomerController@index')->name('index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('add-to-cart/{product_id}', [
	'uses' => 'CustomerController@AddToCart',
	'as' => 'product.addToCart'
]);

Route::get('/cart', [
	'uses' => 'CustomerController@getCart',
	'as' => 'product.Cart'
]);

Route::get('/', [
	'uses' => 'CustomerController@index',
	'as' => 'customer.index'
]);
