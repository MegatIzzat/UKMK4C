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
                    'staff_id' => 'S0001',
                    'staff_name' => 'Fattah Amin',
                    'staff_pass' => '1234',
                    'staff_level' => 'Manager',
                ],

                [
                    'staff_id' => 'S0002',
                    'staff_name' => 'Zizan Razak',
                    'staff_pass' => '1234',
                    'staff_level' => 'Staff',
                ],

                [
                    'staff_id' => 'S0003',
                    'staff_name' => 'Zaiton Sameon',
                    'staff_pass' => '1234',
                    'staff_level' => 'Staff',
                ]

        ]);
    }
}
