<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;

class TopupController extends Controller
{
    public function index()
    {
        return view('staff.topup.index');
    }

    public function update(Request $request){
        $cust_id = $request->cust_id;
        $customer = Customer::find($cust_id);

        if($customer === null){
            return redirect()->route('staff.topup.index')->with('error', 'Customer does not exist.');
        } else {
            $amount = $request->input('topupvalue');
            $bal = $customer->cust_balance + $amount;
            $customer = \DB::table('customer')->where('cust_id', $cust_id)->update(['cust_balance' => $bal]);
        }
        

        return redirect()->route('staff.topup.index')->with('success', 'RM'.$amount.' has been successfully top up to '.$cust_id);
    }

}