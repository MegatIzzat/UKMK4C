<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use App\User;

class AjaxController extends Controller
{
     public function index()
    {

        $user = User::get('user_id','user_name');
        $customer = Customer::get('cust_email');
        
        return view('staff.ajax.index',compact('user','customer'));
    }

    }

     public function show()
     {
         $user = User::where('user_id', 'user_name')->firstOrFail();
         $customer = Customer::where('cust_email')->firstOrFail();
        return view('staff.ajax.show', compact('user','customer'));
     }

}
