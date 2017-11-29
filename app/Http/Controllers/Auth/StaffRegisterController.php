<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Staff;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class StaffRegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;


    protected $redirectTo = '/staff';

    public function __construct()
    {
        $this->middleware('guest');
    }

    public function showRegistrationForm()
    {
        return view('auth.registerstaff');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'user_id' => 'required|string|max:7|unique:users',
            'password' => 'required|string|min:6|confirmed'
        ]);
    }
    
    protected function create(array $data)
    {
        $user = User::create([
            'user_id' => $data['user_id'],
            'user_name' => $data['name'],
            'password' => bcrypt($data['password']),
            'isAdmin' => $data['is_admin'],
        ]);

        $userid = $user->user_id;

        Staff::create([
            'staff_id' => $userid,
            'staff_email' => $data['email']
        ]);

        return $user;
    }
}
