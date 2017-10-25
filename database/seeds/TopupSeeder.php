<?php

use Illuminate\Database\Seeder;

class TopupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Topup::insert([

                [
                    'cust_id' => 'C0001',
                    'staff_id' => 'S0002',
                    'log_time' => '2017-10-08 10:39:02',
                    'amount' => '30.00',

                ],

                [
                    'cust_id' => 'C0002',
                    'staff_id' => 'S0003',
                    'log_time' => '2017-10-09 16:31:37',
                    'amount' => '30.00',
                ],

                [
                    'cust_id' => 'C0003',
                    'staff_id' => 'S0003',
                    'log_time' => '2017-10-10 16:33:58',
                    'amount' => '30.00',
                ]

        ]);
    }
}
