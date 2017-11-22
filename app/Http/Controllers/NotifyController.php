<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notify;


class NotifyController extends Controller
{
    //
    public function refreshNavbar()
    {
        //
        $notify = Notify::get();
        return view('layouts.customer.test',compact('notify'));
    }
}
