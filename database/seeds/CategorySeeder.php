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
        //
        App\Category::insert([
        	['category_id' => 'C1', 
        	'category_name' => 'Nasi Goreng'],
        ]);
    }
}
