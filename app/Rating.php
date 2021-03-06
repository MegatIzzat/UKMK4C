<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    //
	protected $primaryKey = 'rating_id';
    public $incrementing = false;
    protected $table = 'rating';
    protected $fillable = ['rating_id','product_id','product_rating'];

    public $timestamps = false;

    public function Product(){
    	return $this->belongsTo('App\ProductModel','product_id');
    }
}
