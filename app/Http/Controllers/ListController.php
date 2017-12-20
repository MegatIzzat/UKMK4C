<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use App\User;
use App\Staff;
use App\Order;
use App\Orderline;
use App\Product;



class ListController extends Controller
{
    public function customerlist()
    {

        $user = User::get();
        $customer = Customer::paginate(10);
        
        return view('staff.list.customerlist',compact('user','customer'));
    }

    public function stafflist()
    {

        $user = User::get();
        $staff = Staff::paginate(20);
        
        return view('staff.list.stafflist',compact('user','staff'));
    }

    public function orderlist()
    {
        $order = Order::Paginate(20);
        $orderline = Orderline::get();
        $product = Product::get();

        return view('staff.list.orderlist',compact('order','orderline','product'));
    }


    public function resetpassword(Request $request, $id)
    {
        //
        $newpassword='123456';
        $password = \DB::table('users')->where('user_id', $id)->update(['password' => bcrypt($newpassword)]);
        return redirect()->route('staff.customerlist')->with('success',$id.' password has been reset to '.$newpassword.'.');;
    }




}
