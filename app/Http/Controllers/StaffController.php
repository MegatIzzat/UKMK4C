<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\Orderline;
use App\Product;
use Validator;
use App\Category;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('staff.index');
    }

    public function viewFeedback()
    {
        $order = Order::Paginate(20);
        $orderline = Orderline::get();
        $product = Product::get();

        return view('staff.feedback.viewfeedback',compact('order','orderline','product'));
    }

    public function report()
    {
        return view('staff.report.index');
    }

    public function catindex(){
        $category = Category::paginate(10);
        return view('staff.category.index',compact('category'));
    }

    public function store(Request $request){
        Validator::make($request->all(), [
            'category_id' => 'required|string|max:5',
            'category_name' => 'required|string',
            ])->validate();

        Category::create($request->all());

        return redirect()->route('staff.product.index')->with('success','Category '.$request->category_name.' has been added!');
    }

    public function edit($id){
        $category = Category::where('category_id','=',$id)->first();
        return view('staff.category.edit',compact('category'));
    }

    public function update(Request $request, $id){
        Validator::make($request->all(), [
            'category_id' => 'required|string|max:5',
            'category_name' => 'required|string',
            ])->validate();

        Category::where('category_id','=',$id)->update(['category_name'=>$request->category_name]);

        return redirect()->route('staff.category.index')->with('success','Category '.$request->category_name.' has been updated!');
    }

    public function delete(Request $request, $id){
        if(Category::where('category_id','=',$id)->delete()) {
            return redirect()->route('staff.category.index')->with('success', $id.' has been successfully deleted!');
        } else {
            return redirect()->route('staff.category.index')->with('error', 'Please try again!');
        }
    }
}
