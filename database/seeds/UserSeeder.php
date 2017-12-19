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
                    'user_id' => 'A111111',
                    'user_name' => 'Test1',
                    'password' => bcrypt(123456),
                    'isAdmin' => '0'
                ],

                [
                    'user_id' => 'A111112',
                    'user_name' => 'Test2',
                    'password' => bcrypt(123456),
                    'isAdmin' => '0'
                ],

                [
                    'user_id' => 'A111113',
                    'user_name' => 'Test3',
                    'password' => bcrypt(123456),
                    'isAdmin' => '0'
                ],

                [
                    'user_id' => 'A111114',
                    'user_name' => 'Test4',
                    'password' => bcrypt(123456),
                    'isAdmin' => '0'
                ],

                [
                    'user_id' => 'A222221',
                    'user_name' => 'Test5',
                    'password' => bcrypt(123456),
                    'isAdmin' => '0'
                ],

                [
                    'user_id' => 'A222222',
                    'user_name' => 'Test6',
                    'password' => bcrypt(123456),
                    'isAdmin' => '0'
                ],

                [
                    'user_id' => 'A222223',
                    'user_name' => 'Test7',
                    'password' => bcrypt(123456),
                    'isAdmin' => '0'
                ],

                [
                    'user_id' => 'A222224',
                    'user_name' => 'Test8',
                    'password' => bcrypt(123456),
                    'isAdmin' => '0'
                ],

                [
                    'user_id' => 'A333331',
                    'user_name' => 'Test9',
                    'password' => bcrypt(123456),
                    'isAdmin' => '0'
                ],

                [
                    'user_id' => 'A333332',
                    'user_name' => 'Test10',
                    'password' => bcrypt(123456),
                    'isAdmin' => '0'
                ],

                [
                    'user_id' => 'A333333',
                    'user_name' => 'Test11',
                    'password' => bcrypt(123456),
                    'isAdmin' => '0'
                ],

                [
                    'user_id' => 'A333334',
                    'user_name' => 'Test12',
                    'password' => bcrypt(123456),
                    'isAdmin' => '0'
                ],

                [
                    'user_id' => 'admin',
                    'user_name' => 'Bro Panjang',
                    'password' => bcrypt(123456),
                    'isAdmin' => '1'
               
                ],

                
        ]);

    }
}