<?php

use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Order::insert([

                [
                    'order_id' => 'B0001',
                    'cust_id' => 'C0001',
                    'total_price' => '9.00',
                    'order_status' => 'Completed',
                    'order_date' => '2017-10-09 19:21:02',

                ],

                [
                    'order_id' => 'B0002',
                    'cust_id' => 'C0002',
                    'total_price' => '5.00',
                    'order_status' => 'Completed',
                    'order_date' => '2017-10-09 17:53:42',
                ],

                [
                    'order_id' => 'B0003',
                    'cust_id' => 'C0003',
                    'total_price' => '3.50',
                    'order_status' => 'In Progress',
                    'order_date' => '2017-10-09 21:05:04',
                ]

        ]);    }
}
