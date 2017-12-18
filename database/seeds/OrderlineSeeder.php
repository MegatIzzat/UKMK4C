<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Product;
use App\Order;

class OrderlineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	    $faker = Faker::create();
	    $products = Product::all()->pluck('product_id')->all();
	    $order = Order::all()->pluck('order_id')->all();
	    foreach (range(1,10000) as $index) {
	      DB::table('orderline')->insert([
	          'order_id' => $faker->unique()->randomElement($order),
	          'product_id' => $faker->randomElement($products),
	          'quantity' => $faker->numberBetween($min = 1, $max = 3),
	      ]);
	    }
    }
}
