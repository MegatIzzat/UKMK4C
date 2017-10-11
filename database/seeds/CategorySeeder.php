<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Category::insert([

                [
                    'category_id' => 'K0001',
                    'category_name' => 'Nasi Goreng',
                ],

                [
                    'category_id' => 'K0002',
                    'category_name' => 'Kuey Teow / Mee Goreng',
                ],

                [
                    'category_id' => 'K0003',
                    'category_name' => 'Minuman Sejuk',
                ],

                [
                    'category_id' => 'K0004',
                    'category_name' => 'Minuman Panas',
                ]
        ]);
    }
}
