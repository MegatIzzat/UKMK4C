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
        $currtime=\Carbon\Carbon::now()->toDateTimeString();//Get current time in GMT +8 ->setTimezone('Asia/Kuala_Lumpur')
        App\Order::insert([

                [
                    'order_id' => 'B0001',
                    'cust_id' => 'C0001',
                    'total_price' => '5.50',
                    'order_status' => 'Completed',
                    'order_date' => '2017-10-31 19:21:02',

                ],

                [
                    'order_id' => 'B0002',
                    'cust_id' => 'C0002',
                    'total_price' => '5.00',
                    'order_status' => 'In Progress',
                    'order_date' => '2017-10-31 19:51:02',
                ],

                [
                    'order_id' => 'B0003',
                    'cust_id' => 'C0003',
                    'total_price' => '6.30',
                    'order_status' => 'In Progress',
                    'order_date' => $currtime,
                ],

                [
                    'order_id' => 'B0004',
                    'cust_id' => 'C0002',
                    'total_price' => '11.10',
                    'order_status' => 'In Progress',
                    'order_date' => $currtime,
                ]

        ]);    }
}
