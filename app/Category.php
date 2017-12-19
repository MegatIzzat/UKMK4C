<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    
    protected $table = 'category';
    protected $fillable = ['category_id','category_name'];
    protected $primaryKey = ['category_id'];
    public $incrementing = false;

    public function Product(){
    	return $this -> hasMany('App\Product','category_id');
    }
}
