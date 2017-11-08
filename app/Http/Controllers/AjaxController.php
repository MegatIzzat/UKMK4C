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
        $customer = Customer::get();
        
        return view('ajax.index',compact('user','customer'));
    }

     public function show($id)
     {
         $user = User::where('user_id', $id)->firstOrFail();
         $customer = Customer::where('cust_id',$id)->firstOrFail();
        return view('ajax.show', compact('user','customer'));
     }

}
