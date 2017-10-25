<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    public $incrementing = false;
	protected $table = 'order';
	protected $fillable = ['order_id','cust_id','order_date'];

	public function Customer(){
		return $this->belongsTo('App\Customer','cust_id');
	}

}