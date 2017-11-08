<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    //
    protected $table = 'staff';
    protected $fillable = ['staff_id','staff_email'];

    public $timestamps = false;
    protected $primaryKey = 'staff_id';

    public function Advertisement(){
    	return $this->hasMany('App\Advertisement','staff_id');
    }

    public function Order(){
    	return $this->hasMany('App\Order','order_id');
    }

        public function User(){
    	return $this->hasOne('App\User', 'user_id', 'staff_id');

    }
}
