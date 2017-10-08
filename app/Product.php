<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $table = 'product';
    protected $fillable = ['product_id','product_name','product_price','category_id','product_img'];

    public function Category(){
    	return $this->belongTo('App\CategoryModel','category_id');
    }
}
