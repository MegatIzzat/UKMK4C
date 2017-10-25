<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    //
    protected $table = 'customer';
    protected $fillable = ['cust_id','cust_name','cust_pass','cust_balance'];
    protected $primaryKey = 'cust_id';

    public function Topup(){
    	return $this->hasMany('App\Topup','cust_id');
    }

    public function Order(){
    	return $this->hasMany('App\Order','cust_id');
    }
}
