<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
	protected $table = 'order';
	protected $primaryKey = 'order_id';
	protected $fillable = ['order_id','cust_id','order_status'];
	public const CREATED_AT = 'order_date';
	public const UPDATED_AT = 'order_modified';

	public $timestamp = false;

	public function Customer(){
		return $this->belongTo('App\Customer');
	}

	public function Orderline(){
		return $this->hasMany('App\Orderline');
	}

}
