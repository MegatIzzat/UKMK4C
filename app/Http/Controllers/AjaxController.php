<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use App\User;
use App\Staff;

class AjaxController extends Controller
{
    public function customerlist()
    {

        $user = User::get();
        $customer = Customer::paginate(30);
        
        return view('ajax.customerlist',compact('user','customer'));
    }

    public function stafflist()
    {

        $user = User::get();
        $staff = Staff::paginate(30);
        
        return view('ajax.stafflist',compact('user','staff'));
    }


}
