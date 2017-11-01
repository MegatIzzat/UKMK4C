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
// Route::post('/productmanagement', 'ProductController@store')->name('store');

Route::put('/productmanagement/{product_id?}', 'ProductController@update')->name('update');

Route::delete('/productmanagement/{product_id?}', 'ProductController@destroy')->name('delete');

// Route::get('form-validation', 'HomeController@formValidation');
// Route::post('form-validation', 'HomeController@formValidationPost');

// Route::get('productajaxCRUD', function () {
//     $products = App\Product::all();
//     return view('product.index')->with('products',$products);
// });
// Route::get('productajaxCRUD/{product_id?}',function($product_id){
//     $product = App\Product::find($product_id);
//     return response()->json($product);
// });
// Route::post('productajaxCRUD',function(Request $request){   
//     $product = App\Product::create($request->input());
//     return response()->json($product);
// });
// Route::put('productajaxCRUD/{product_id?}',function(Request $request,$product_id){
//     $product = App\Product::find($product_id);
//     $product->product_name = $request->product_name;
//     $product->product_price= $request->product_price;
//     $product->category_id= $request->category_id;
//     $product->product_img= $request->product_img;
//     $product->product_rating= $request->product_rating;
//     $product->save();
//     return response()->json($product);
// });
// Route::delete('productajaxCRUD/{product_id?}',function($product_id){
//     $product = App\Product::destroy($product_id);
//     return response()->json($product);
// });
use App\Product;
use App\Rating;
use App\Order;
use App\Orderline;

Route::get('rating', [
	'uses' => 'CustomerController@getRating',
	'as' => 'customer.getRating'
]);

Route::get('rating/{product_id}',function($product_id){
    $rating = App\Rating::where('product_id', $product_id)->get();
    return response()->json($r);
});

Route::post('rating/{product_id}', [
	'uses' => 'CustomerController@sendRating',
	'as' => 'customer.sendRating'
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