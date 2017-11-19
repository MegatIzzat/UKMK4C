<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notify extends Model
{
    //
    public $incrementing = false;
    public $timestamps = false;
    protected $table = 'notify';
    protected $fillable = ['order_id','is_seen'];

    public function Order(){
        return $this->hasMany('App\Order','order_id');
    }

    
}
