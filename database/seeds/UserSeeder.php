<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         App\User::insert([
         		[
                    'user_id' => 'admin',
                    'name' => 'Fattah Amin',
                    'email' => 'fattah@gmail.com',
                    'password' => '1234',
                    
                ],

                [
                    'user_id' => 'S0002',
                    'name' => 'Zizan Razak',
                    'email' => 'zizan@gmail.com',
                    'password' => '1234',
                ],

                [
                    'user_id' => 'S0003',
                    'name' => 'Zaiton Sameon',
                    'email' => 'zaiton@gmail.com',
                    'password' => '1234',
                ],

                [
                    'user_id' => 'C0001',
                    'name' => 'Awaluddin Alimuddin',
                    'email' => 'awaluddin@gmail.com',
                    'password' => '1234',
                    
                ],

                [
                    'user_id' => 'C0002',
                    'name' => 'Ashraf Razlan',
                    'email' => 'ashraf@gmail.com',
                    'password' => '1234',
                ],

                [
                    'user_id' => 'C0003',
                    'name' => 'Syafiqah Salim',
                    'email' => 'syafiqah@gmail.com',
                    'password' => '1234',
                ]

        ]);
    }
}
