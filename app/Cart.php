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

	public function addByOne($id){
		$this->items[$id]['qty']++;
		$this->items[$id]['price'] += $this->items[$id]['item']['product_price'];
		$this->totalQty++;
		$this->totalPrice += $this->items[$id]['item']['product_price'];
	}

	public function reduceByOne($id){
		$this->items[$id]['qty']--;
		$this->items[$id]['price'] -= $this->items[$id]['item']['product_price'];
		$this->totalQty--;
		$this->totalPrice -= $this->items[$id]['item']['product_price'];

		if($this->items[$id]['qty']<=0){
			unset($this->items[$id]);
		}
	}

	public function removeItem($id){
		$this->totalQty -= $this->items[$id]['qty'];
		$this->totalPrice -= $this->items[$id]['price'];
		unset($this->items[$id]);
	}


}
