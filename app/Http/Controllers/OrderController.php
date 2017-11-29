<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\Orderline;
use App\Product;
use Carbon\Carbon;

class OrderController extends Controller
{
    //
	public function index()
	{
		$order = Order::orderBy('order_date','DESC')->where('order_status', 'In Progress')->get();
		$orderline = Orderline::get();
		$product = Product::get();

    	return view('staff.index',compact('order','orderline','product'));
	}

	public function update($id)
    {
        $order = Order::find($id);
        $order->order_status = 'Completed';
        $order->order_completed = Carbon::now();
        $order->save();

        return redirect()->route('staff.index');
    }

}