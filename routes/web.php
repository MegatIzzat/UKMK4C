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
	Route::post('store', 'StaffController@store')->name('store');
	Route::get('edit/{id}', 'StaffController@edit')->name('edit');
	Route::put('update/{id}','StaffController@update')->name('update');
	Route::delete('delete/{id}', 'StaffController@destroy')->name('delete');
});

/*------------------------ CUSTOMER -------------------------------*/

Route::group(['prefix'=>'/', 'as'=>'cust.', 'name'=>'cust' ], function(){
	

});

Route::group(['prefix'=>'/', 'middleware' => 'auth','as'=>'cust.', 'name'=>'cust' ], function(){
	Route::get('checkout/{user}', 'CustomerController@checkout')->name('checkout');
	
});

/*------------------------ AUTH -------------------------------*/
Auth::routes();

/*------------------------ HOME -------------------------------*/
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/','CustomerController@index')->name('index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


/*------------------------ PRODUCT -----------------------------*/

use Illuminate\Http\Request;

Route::get('/productmanagement', 'ProductController@index')->name('index');

Route::get('/productmanagement/{product_id?}', 'ProductController@show')->name('show');

Route::post('/productmanagement', 'ProductController@create')->name('create');

Route::put('/productmanagement/{product_id?}', 'ProductController@update')->name('update');

Route::delete('/productmanagement/{product_id?}', 'ProductController@destroy')->name('delete');

use App\Product;
use App\Rating;
use App\Order;
use App\Orderline;

Route::get('orderhistory', [
	'uses' => 'CustomerController@orderHistory',
	'as' => 'customer.orderHistory'
]);

Route::get('orderhistory/{product_id}',function($product_id){
    $rating = App\Rating::where('product_id', $product_id)->get();
    return response()->json($r);
});

Route::post('orderhistory/{product_id}', [
	'uses' => 'CustomerController@sendRating',
	'as' => 'customer.sendRating'
]);

Route::group(['prefix'=>'/orderhistory/', 'as'=>'customer.', 'name'=>'customer' ], function(){
			Route::put('sendFeedback/{id}','CustomerController@sendFeedback')->name('sendFeedback');
	});

Route::get('viewfeedback', [
	'uses' => 'ManagerController@viewFeedback',
	'as' => 'manager.viewFeedback'
]);


/*------------------------ CART -----------------------------*/


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
	'as' => 'cust.index'
]);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/*-------------------------------- TOP UP -------------------------------------*/

Route::get('topup', function(){
	return view('staff.topup');
});

Route::get('topup/{cust_id?}',function($cust_id){
    $customer = App\Customer::find($cust_id);
    return response()->json($customer);
});

Route::put('topup/{cust_id?}', function(Request $request,$cust_id){
	$customer = App\Customer::find($cust_id);
	$customer->cust_balance += $request->cust_balance;
	$customer->save();
	return response()->json($customer);
});


/*------------------------ STAFF -----------------------------*/
//use Illuminate\Http\Request;

Route::group(['prefix'=>'/orderstatus/', 'name'=>'orderstatus' ], function(){

	Route::get('', 'OrderController@index')->name('index');
	Route::get('update/{id}','OrderController@update')->name('update');
});




/*------------------------ ADVERTISEMENT -----------------------------*/

Route::get('/advertisement','AdverController@index');
Route::post('/advertisement','AdverController@create');
Route::get('/advertisement/{advertisement_id}', 'AdverController@show');
Route::put('/advertisement/{advertisement_id}', 'AdverController@update');
Route::delete('/advertisement/{advertisement_id}', 'AdverController@destroy');


/*--------------------------profile*/

Route::group(['prefix'=>'/profile/', 'name'=>'profile', 'as'=>'profile.' ], function(){
	
	Route::get('create', 'ProfileController@create')->name('create');
	Route::post('store', 'ProfileController@store')->name('store');
	Route::get('edit/{id}', 'ProfileController@edit')->name('edit');
	Route::get('','ProfileController@index')->name('index');
	Route::get('show/{user}', 'ProfileController@show')->name('show');
    Route::put('update/{user}','ProfileController@update')->name('update');
});

