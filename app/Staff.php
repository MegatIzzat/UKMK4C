<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    //
    protected $table = 'staff';
    protected $fillable = ['staff_id','staff_name','staff_pass','staff_level'];

    public function Advertisement(){
    	return $this->hasMany('App\Advertisement','staff_id');
    }

    public function Order(){
    	return $this->hasMany('App\Order','order_id');
    }
}
