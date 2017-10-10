<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    //
    protected $table = 'feedback';
    protected $fillable = ['feedback_id','feedback_comment','order_id'];

    public function Order(){
    	return $this->belongTo('App\Order','order_id');
    }
}
