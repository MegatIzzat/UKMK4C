<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use App\User;
use App\Notify;
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
       $notify = Notify::get();

       return view('customer.profile',compact('user','customer','notify'));
    
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
        $notify = Notify::get();


        return view('customer.profile', compact('user','customer','notify'));

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
            'user_id' => 'required|string|7',
            'name' => 'required|string|min:1',
            'email' => 'required|string|min:10',
            'password' => 'required|string',
            ])->validate();

         $password = bcrypt($request->password);

        User::findOrFail($user)->update([
            'user_id' => $user,
            'name' => $request->name,
            'email' => $request->email,
            'password' => $password
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
