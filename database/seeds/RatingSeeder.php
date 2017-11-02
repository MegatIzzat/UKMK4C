<?php

use Illuminate\Database\Seeder;

class RatingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        App\Rating::insert([
        [
                    'product_id' => 'P0002',
                    'product_rating' => '2.5',
        ],

        [
                    'product_id' => 'P0002',
                    'product_rating' => '4.0',
        ],

        [
                    'product_id' => 'P0002',
                    'product_rating' => '4.0',
        ],

        [
                    'product_id' => 'P0002',
                    'product_rating' => '3.0',
        ],

        [
                    'product_id' => 'P0002',
                    'product_rating' => '1.0',
        ],

        [
                    'product_id' => 'P0004',
                    'product_rating' => '2.0',
        ],

        [
                    'product_id' => 'P0004',
                    'product_rating' => '1.0',
        ],

        [
                    'product_id' => 'P0004',
                    'product_rating' => '1.5',
        ],

        [
                    'product_id' => 'P0004',
                    'product_rating' => '1.5',
        ],

    ]);    
    }
    
}
