<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;

class ProductController extends Controller
{

    public function index()
    {
    	$products = Product::all();
    	return view('product.index')->with('products',$products);
    }

    public function show($product_id)
    {
    	$product = Product::find($product_id);
    	return response()->json($product);	
    }


    public function create(Request $request)
    {
    	$product = Product::create($request->input());
    	return response()->json($product);
    }

    // public function store(Request $request)
    // {
    //     $this->validate($request,[
    //             'product_id' => 'required|max:5|unique:product',
    //             'product_name' => 'required|max:30',
    //             'product_price' => 'required',
    //             'category_id' => 'required|max:5',
    //             'product_img' => 'required',
    //             'product_rating' => 'required',
    //         ],[
    //             'product_id.required' => ' The product ID field is required.',
    //             'product_id.max' => ' The product ID may not be greater than 5 characters.',
    //             'product_name.required' => ' The product name field is required.',
    //             'product_name.max' => ' The last name may not be greater than 30 characters.',
    //             'product_price.required' => ' The product price field is required.',
    //             'category_id.required' => ' The category ID field is required.',
    //             'category_id.max' => ' The category ID may not be greater than 5 characters.',
    //             'product_img.required' => ' The product image field is required.',
    //             'product_rating.required' => ' The product rating field is required.',

    //         ]);

    //     dd('Product added successfully.');

    //     $product = Product::create($request->input());
    //     return response()->json($product);
    // }

    public function update(Request $request,$product_id)
    {
    	$product = Product::find($product_id);
	    $product->product_name = $request->product_name;
	    $product->product_price= $request->product_price;
	    $product->category_id= $request->category_id;
	    $product->product_img= $request->product_img;
	    $product->product_rating= $request->product_rating;
	    $product->save();
	    return response()->json($product);
    }

    public function destroy($product_id)
    {
    	$product = Product::destroy($product_id);
    	return response()->json($product);
    }

}
