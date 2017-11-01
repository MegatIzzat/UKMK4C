<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Feedback;
use App\Orderline;
use App\Order;
use App\Product;

class FeedbackController extends Controller
{
    //
    public function index()
	{
		$order = Order::get();
		$feedback = Feedback::get();
		$orderline = Orderline::get();
		$product = Product::get();

    	return view('customer.feedback',compact('order','feedback','orderline','product'));
	}

	public function update($id)
    {
        $order = Order::find($id);
        $order->order_status = 'Completed';
        $order->save();

        return redirect('/orderstatus');
    }
}