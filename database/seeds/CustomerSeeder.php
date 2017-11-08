<?php

use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Customer::insert([

                [
                    'cust_id' => 'C0001',
                    'cust_email' => 'nadia@gmail.com',
                    'cust_balance' => '30.00',
                ],

        ]);
    }
}
