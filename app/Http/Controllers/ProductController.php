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
        $products = Product::all();
        $category=Category::all();
        return view('staff.product.index', compact('category'))->with('products',$products);
        // return view('product.index')->with('products',$products);
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

    public function update(Request $request,$product_id)
    {
        // $product = Product::find($product_id)->update([
        // $product->product_name = $request->upproduct_name,
        // $product->product_price= $request->upproduct_price,
        // $product->category_id= $request->upcategory_id,
        // $product->product_img= $request->upproduct_img,
        // $product->product_rating= $request->upproduct_rating,
     //    ]);

        // $product->save();
        // return response()->json($product);
        Validator::make($request->all(), [
            'upproduct_id' => 'required',
            'upproduct_name' => 'required',
            'upproduct_price' => 'required',
            'upproduct_img' => '',
            'upcategory_id' => 'required',
            'upproduct_rating' => 'required',
            ])->validate();

        $id = $request->upproduct_id;

        Product::findOrFail($id)->update([
            'product_id' => $id,
            'product_name' => $request->upproduct_name,
            'product_price' => $request->upproduct_price,
            'product_img' => "",
            'category_id' => $request->upcategory_id,
            'product_rating' => $request->upproduct_rating,

            ]);
        
        return redirect()->route('staff.product.index')->with('success', $id.' has been successfully updated!');
    }

    public function destroy(Request $request, $product_id)
    {
        $id = $request->deproduct_id;

        $product = Product::destroy($id);
        return redirect()->route('staff.product.index')->with('success', $id.' has been successfully deleted!');
    }

    public function upload(Request $request)
    {
        $product_id = $request->fileproduct_id;
        $file = $request->file('fileproduct_img');
        $filename = $file->getClientOriginalName();
        $product = \DB::table('product')->where('product_id', $product_id)->update(['product_img' => $filename]);
        if (!empty($file)){
            Storage::disk('upload')->put($file->getClientOriginalName(), file_get_contents($file));
        }

        return redirect()->route('staff.product.index')->with('success', $filename.' has been successfully uploaded!');
    }

}