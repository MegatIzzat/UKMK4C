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
                    'staff_id' => 'S0002',
                    'order_date' => '2017-10-09 19:21:02',

                ],

                [
                    'order_id' => 'B0002',
                    'cust_id' => 'C0002',
                    'staff_id' => 'S0003',
                    'order_date' => '2017-10-09 17:53:42',
                ],

                [
                    'order_id' => 'B0003',
                    'cust_id' => 'C0003',
                    'staff_id' => 'S0003',
                    'order_date' => '2017-10-09 21:05:04',
                ]

        ]);    }
}
