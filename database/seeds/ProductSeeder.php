<?php

use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        App\Product::insert([
        	['product_id' => 'K001',
        	'product_name' => 'Nasi Goreng Kampung',
        	'product_price' => 4.00,
        	'category_id' => 'C1',
        	'product_img' => 'K001.jpg',
        	'product_rating' => 2.5],

        	['product_id' => 'K002',
        	'product_name' => 'Nasi Goreng Kampung',
        	'product_price' => 4.00,
        	'category_id' => 'C1',
        	'product_img' => 'K001.jpg',
        	'product_rating' => 2.5],

        	['product_id' => 'K003',
        	'product_name' => 'Nasi Goreng Kampung',
        	'product_price' => 4.00,
        	'category_id' => 'C1',
        	'product_img' => 'K001.jpg',
        	'product_rating' => 2.5],
        ]);
    }
}
