<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'user_name', 'password', 'isAdmin'
    ];

    public $incrementing = false;
    protected $primaryKey = 'user_id';

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function Customer(){
        return $this->hasOne('App\Customer','user_id','cust_id');
    }

    public function isAdmin(){
        if($this->isAdmin){
            return true;
        }
        return false;
    }
}
