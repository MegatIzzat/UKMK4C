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
                    'cust_id' => 'A111111',
                    'cust_email' => 'test@gmail.com',
                    'cust_balance' => '30.00'
                ],

                [
                    'cust_id' => 'A111112',
                    'cust_email' => 'test@gmail.com',
                    'cust_balance' => '30.00'
                ],

                [
                    'cust_id' => 'A111113',
                    'cust_email' => 'test@gmail.com',
                    'cust_balance' => '30.00'
                ],

                [
                    'cust_id' => 'A111114',
                    'cust_email' => 'test@gmail.com',
                    'cust_balance' => '30.00'
                ],

                [
                    'cust_id' => 'A222221',
                    'cust_email' => 'test@gmail.com',
                    'cust_balance' => '30.00'
                ],

                [
                    'cust_id' => 'A222222',
                    'cust_email' => 'test@gmail.com',
                    'cust_balance' => '30.00'
                ],

                [
                    'cust_id' => 'A222223',
                    'cust_email' => 'test@gmail.com',
                    'cust_balance' => '30.00'
                ],

                [
                    'cust_id' => 'A222224',
                    'cust_email' => 'test@gmail.com',
                    'cust_balance' => '30.00'
                ],

                [
                    'cust_id' => 'A333331',
                    'cust_email' => 'test@gmail.com',
                    'cust_balance' => '30.00'
                ],

                [
                    'cust_id' => 'A333332',
                    'cust_email' => 'test@gmail.com',
                    'cust_balance' => '30.00'
                ],

                [
                    'cust_id' => 'A333333',
                    'cust_email' => 'test@gmail.com',
                    'cust_balance' => '30.00'
                ],

                [
                    'cust_id' => 'A333334',
                    'cust_email' => 'test@gmail.com',
                    'cust_balance' => '30.00'
                ],

                
        ]);

    }
}