<?php

use Illuminate\Database\Seeder;

class OrderlineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Orderline::insert([

                [
                    'order_id' => 'B0001',
                    'product_id' => 'P0002',
                    'quantity' => '1',
                    'order_date' => '2017-10-09 19:21:02',
                    'total_price' => '9.00',
                ],

                [
                    'order_id' => 'B0002',
                    'product_id' => 'P0004',
                    'quantity' => '1',
                    'order_date' => '2017-10-09 17:53:42',
                    'total_price' => '5.00',
                ],

                [
                    'order_id' => 'B0002',
                    'product_id' => 'P0011',
                    'quantity' => '1',
                    'order_date' => '2017-10-09 17:53:42',
                    'total_price' => '1.80',
                ],

                [
                    'order_id' => 'B0003',
                    'product_id' => 'P0009',
                    'quantity' => '1',
                    'order_date' => '2017-10-09 21:05:04',
                    'total_price' => '3.50',
                ],

                [
                    'order_id' => 'B0003',
                    'product_id' => 'P0018',
                    'quantity' => '1',
                    'order_date' => '2017-10-09 21:05:04',
                    'total_price' => '1.30',
                ]

        ]);    }
}
