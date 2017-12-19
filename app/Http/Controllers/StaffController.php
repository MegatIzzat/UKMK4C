<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\Orderline;
use App\Product;

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
}
