<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Topup extends Model
{
    //
    protected $table = 'topup';
    protected $fillable = ['cust_id','staff_id','log_time','amount'];

    public function Customer(){
    	return $this->hasMany('App\Customer','cust_id');
    }

    public function Staff(){
    	return $this->hasMany('App\Staff','staff_id');
    }
}
