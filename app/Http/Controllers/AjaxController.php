<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use App\User;

class AjaxController extends Controller
{
     public function index()
    {

        $user = User::get();
        $customer = Customer::paginate(30);
        
        return view('ajax.index',compact('user','customer'));
    }


}
