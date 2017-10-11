<?php

use Illuminate\Database\Seeder;

class AdvertisementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         App\Advertisement::insert([

                [
                    'advertisement_id' => 'A0001',
                    'advertisement_name' => 'Job Hiring',
                    'advertisement_img' => '',
                    'staff_id' => 'S0001',
                ],

                [
                    'advertisement_id' => 'A0002',
                    'advertisement_name' => 'New Menu',
                    'advertisement_img' => '',
                    'staff_id' => 'S0001',
                ],

                [
                    'advertisement_id' => 'A0003',
                    'advertisement_name' => 'Lucky Draw',
                    'advertisement_img' => '',
                    'staff_id' => 'S0001',
                ]

        ]);    }
}
