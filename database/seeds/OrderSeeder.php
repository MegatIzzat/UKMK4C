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
                    'order_status' => 'Completed',
                ],

                [
                    'order_id' => 'B0002',
                    'cust_id' => 'C0002',
                    'order_status' => 'Completed',
                ],

                [
                    'order_id' => 'B0003',
                    'cust_id' => 'C0003',
                    'order_status' => 'In Progress',
                ]

        ]);    }
}
