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
                    'staff_level' => 'Manager',
                ],

                [
                    'staff_id' => 'S0002',                    
                    'staff_level' => 'Staff',
                ],

                [
                    'staff_id' => 'S0003',                    
                    'staff_level' => 'Staff',
                ]

        ]);
    }
}
