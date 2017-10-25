<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\Orderline;
use App\Product;
use Validator;

class OrderController extends Controller
{
    //
	public function index()
	{

		$order = Order::get();
		$orderline = Orderline::get();
		$product = Product::get();

    	return view('staff.orderstatus',compact('order','orderline','product'));
	}

	public function update($id)
    {
        $order = Order::find($id);
        $order->order_status = 'Completed';
        $order->save();

        return redirect('/orderstatus');
    }

}