<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Order extends Model
{
    //
    public $incrementing = false;
	protected $table = 'order';
	protected $primaryKey = 'order_id';
	protected $fillable = ['order_id','cust_id','total_price','order_status'];
	public const CREATED_AT = 'order_date';
	public const UPDATED_AT = 'order_modified';
	public $timestamp = false;

	public function Customer(){
		return $this->belongTo('App\Customer','cust_id');
	}

}