<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orderline extends Model
{
    //
    public $incrementing = false;
    protected $table = 'orderline';
    protected $fillable = ['order_id','product_id','quantity','order_date','total_price'];

    public function Order(){
    	return $this->belongTo('App\Order','order_id');
    }

    public function Product(){
    	return $this->hasMany('App\Product','product_id');
    }
}
