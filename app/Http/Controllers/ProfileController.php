<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use App\User;
use Validator;
use Session;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::all();
       $customer = Customer::all();
       return view('customer.profile',compact('user','customer'));
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($user_id)
    {
        $user = User::find($user_id);
       // $user = User::find($name);
        //$user = User::find($email);
        return response()->json($user);  
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //

        $user = User::findOrfail($id);
        $customer = Customer::findOrfail($id);
        return view('customer.profile', compact('user','customer'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $user)
    {
        //
        // `$user = User::find($user_id);
        // $user->name = $request->name;
        // $user->email = $request->email;
        // $user->password = $request->password;
        
        // $user->save();
        // return response()->json($user);

        Validator::make($request->all(), [
            'user_id' => 'required|string|max:7',
            'name' => 'required|string|min:1',
            'email' => 'required|string|min:10',
            'password' => 'required|string',
            ])->validate();

        $pass = strlen($request->password);

        if($pass < 16) {

         $password = bcrypt($request->password);

        } else {
            $password = $request->password;
        }

        User::findOrFail($user)->update([
            'user_id' => $user,
            'name' => $request->name,
            'password' => $password
            ]);
        Customer::findOrFail($user)->update([
            'cust_email' => $request->email
            ]);
        return redirect()->route('cust.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $user = User::destroy($user_id);
        return redirect()->json('profile.index');
    }
}
