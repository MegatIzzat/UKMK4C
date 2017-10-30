<?php

namespace App;

class Cart
{
    //
    public $items = null;
    public $totalQty = 0;
    public $totalPrice = 0;

    public function __construct($oldCart){
    	if($oldCart){
    		$this->items = $oldCart->items;
    		$this->totalQty = $oldCart->totalQty;
    		$this->totalPrice = $oldCart->totalPrice;
    	}
    }

    public function add($item, $product_id){
    	$storedItem = ['qty' => 0, 'price' => $item->product_price, 'item' => $item];
        
    	if ($this->items){
    		if (array_key_exists($product_id, $this->items)) {
    			$storedItem = $this->items[$product_id];
    		}
    	}
    	$storedItem['qty']++;
    	$storedItem['price'] = $item->product_price * $storedItem['qty'];
    	$this->items[$product_id] = $storedItem;
    	$this->totalQty++;
    	$this->totalPrice += $item->product_price;
    }
}
