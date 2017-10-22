<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    public $incrementing = false;
	protected $table = 'order';
	protected $fillable = ['order_id','cust_id','staff_id','order_status'];

	public function Customer(){
		return $this->belongTo('App\Customer','cust_id');
	}

	public function Staff(){
		return $this->belongTo('App\Staff','staff_id');
	}

	public function Orderline(){
		return $this->belongTo('App\Orderline','order_id');
	}

}
