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
                ],

                [
                    'order_id' => 'B0001',
                    'product_id' => 'P0017',
                    'quantity' => '1',
                ],


                [
                    'order_id' => 'B0002',
                    'product_id' => 'P0004',
                    'quantity' => '1',
                ],

                [
                    'order_id' => 'B0003',
                    'product_id' => 'P0009',
                    'quantity' => '1',
                ],

                [
                    'order_id' => 'B0003',
                    'product_id' => 'P0011',
                    'quantity' => '1',
                ],

                [
                    'order_id' => 'B0003',
                    'product_id' => 'P0019',
                    'quantity' => '1',
                ],

                [
                    'order_id' => 'B0004',
                    'product_id' => 'P0003',
                    'quantity' => '1',
                ],

                [
                    'order_id' => 'B0004',
                    'product_id' => 'P0004',
                    'quantity' => '1',
                ],

                [
                    'order_id' => 'B0004',
                    'product_id' => 'P0014',
                    'quantity' => '1',
                ],



        ]);    }
}
