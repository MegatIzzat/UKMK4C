<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    //
    public $incrementing = false;
    protected $table = 'rating';
    protected $fillable = ['product_id','product_rating'];

    public function Product(){
    	return $this->belongsTo('App\ProductModel','product_id');
    }
}
