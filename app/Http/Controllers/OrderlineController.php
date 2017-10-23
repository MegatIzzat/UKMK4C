<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Orderline;
use App\Product;
use Validator;

class OrderlineController extends Controller
{
    //
	public function index()
	{

		$orderline = Orderline::get();
		$product = Product::get();
    	return view('staff.orderstatus',compact('orderline','product'));
	}

	public function update(Request $request, $id)
    {
        //
        Orderline::findOrFail($id)->update($request->all());
        $orderline->order_status = 'Complete';
    	$orderline->update($request->all);

        return redirect()->route('orderstatus.index');
    }

}