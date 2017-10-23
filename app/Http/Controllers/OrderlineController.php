<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderlineController extends Controller
{
    //
	public function update(Orderline $order_id)
	{
		$orderline->update(['order_status'=>'Completed']);
	}
}