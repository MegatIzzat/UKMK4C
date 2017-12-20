<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orderline extends Model
{
    //
    public $timestamps = false;
    protected $table = 'orderline';
    protected $fillable = ['order_id','product_id','quantity','rating_id'];

    public function Order(){
    	return $this->belongTo('App\Order','order_id');
    }

    public function Product(){
    	return $this->hasMany('App\Product','product_id');
    }
}
