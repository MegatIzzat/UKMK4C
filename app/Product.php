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
<<<<<<< HEAD
=======
    public $incrementing = false;
>>>>>>> Illi

    public function Category(){
    	return $this->belongTo('App\CategoryModel','category_id');
    }
}
