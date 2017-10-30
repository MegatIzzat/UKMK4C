<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    public $incrementing = false;
    protected $table = 'product';
    protected $fillable = ['product_id','product_name','product_price','category_id','product_img','product_rating'];
    protected $primaryKey = 'product_id';

    public $timestamps = false;

    public function Category(){
    	return $this->belongsTo('App\CategoryModel','category_id');
    }

    public function Rating(){
        return $this->hasMany('App\Rating','product_id');
    }
}
