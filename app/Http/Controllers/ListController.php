<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use App\User;
use App\Staff;

class ListController extends Controller
{
    public function customerlist()
    {

        $user = User::get();
        $customer = Customer::paginate(20);
        
        return view('staff.list.customerlist',compact('user','customer'));
    }

    public function stafflist()
    {

        $user = User::get();
        $staff = Staff::paginate(20);
        
        return view('staff.list.stafflist',compact('user','staff'));
    }


}
