<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use Storage;
use Validator;


class ProductController extends Controller
{

	public function index()
	{
		$product = Product::Paginate(10);
		$category=Category::all();
		return view('staff.product.index', compact('category','product'));
	}

	public function create(){
		$category = Category::all();
		return view('staff.product.create',compact('category'));
	}

	public function store(Request $request){
		Validator::make($request->all(), [
			'product_id' => 'required|string',
			'product_name' => 'required|string',
			'product_price' => 'required',
			'category_id' => 'required|string',
			'product_img' => 'image|mimes:jpeg,png,jpg,gif,svg',
			'product_rating' => 'required',
			])->validate();

		$data = new Product($request->input());

		if ($request->hasFile('product_img')){
            $file = $request->file('product_img');
            $name = $file->getClientOriginalName();
            $data->product_img = $name;
            $file->move(public_path().'/img/', $name);                   
        }

        $data->save();

		return redirect()->route('staff.product.index')->with('success','Product has been added!');
	}

	public function edit($id){
		$category = Category::all();
		$product = Product::findOrfail($id);
        return view('staff.product.edit', compact('product','category'));
	}

	public function update(Request $request,$id)
	{
		Validator::make($request->all(), [
			'product_id' => 'required|string',
			'product_name' => 'required|string',
			'product_price' => 'required',
			'category_id' => 'required|string',
			'product_img' => 'image|mimes:jpeg,png,jpg,gif,svg',
			'product_rating' => 'required',
			])->validate();

		$data = Product::findOrFail($id);

		$data->update($request->all());

        if ($request->hasFile('product_img')){
            $file = $request->file('product_img');
            $name = $file->getClientOriginalName();
            $data->product_img = $name;
            $file->move(public_path().'/img/', $name);   
            $data->save();                  
        }  
		
		return redirect()->route('staff.product.index')->with('success', $id.' has been successfully updated!');
	}

	public function destroy(Request $request, $id)
	{
		if(Product::destroy($id)) {
            return redirect()->route('staff.product.index')->with('success', $id.' has been successfully deleted!');
        } else {
            return redirect()->route('staff.product.index')->with('error', 'Please try again!');
        }
	}

}