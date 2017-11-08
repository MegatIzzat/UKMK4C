<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    //
    protected $table = 'customer';

    protected $fillable = ['cust_id','cust_email','cust_balance'];
    protected $primaryKey = 'cust_id';

    public $timestamps = false;

    public function Topup(){
    	return $this->hasMany('App\Topup','cust_id');
    }

    public function Order(){
    	return $this->hasMany('App\Order');
    }

    public function User(){
    	return $this->hasOne('App\User', 'user_id', 'cust_id');

    }

}
