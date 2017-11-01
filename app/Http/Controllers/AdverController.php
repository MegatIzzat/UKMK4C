<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Advertisement;

class AdverController extends Controller
{
    //
    public function index(){
    	$advertisement = Advertisement::paginate(20);
    	return view('staff.advertisement',compact('advertisement'));
    }
}
