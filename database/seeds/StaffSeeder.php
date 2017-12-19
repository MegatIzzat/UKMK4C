<?php

use Illuminate\Database\Seeder;

class StaffSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	 App\Staff::insert([

                [
                    'staff_id' => 'admin',
                    'staff_email' => 'admin@gmail.com',
                ],
	]);    
    }
}