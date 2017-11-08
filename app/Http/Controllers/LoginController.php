<?php

namespace App\Http\Controllers;

use App\User;
use Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    //
    public function login(Request $request){
    	// dd($request->all());

    	if(Auth::attempt([
    		'user_id' => $request->user_id,
    		'password' => $request->password
    	])){

    		$user = User::where('user_id',$request->user_id)->first();

    		if($user->isAdmin()){
    			return redirect()->route('staff.index');
    		}

    		return redirect()->route('cust.index');
    	}

    	return redirect()->back();
    }
}
