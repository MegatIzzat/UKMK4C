<?php

use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Product::insert([

                [
                    'product_id' => 'P0001',
                    'product_name' => 'Nasi Goreng Kampung',
                    'product_price' => '4.00',
                    'category_id' => 'K0001',
                    'product_img' => 'P0001.jpg',
                    'product_rating' => '0.0',
                ],

                [
                    'product_id' => 'P0002',
                    'product_name' => 'Nasi Goreng Pattaya',
                    'product_price' => '4.50',
                    'category_id' => 'K0001',
                    'product_img' => 'P0002.jpg',
                    'product_rating' => '0.0',
                ],

                [
                    'product_id' => 'P0003',
                    'product_name' => 'Nasi Goreng Seafood',
                    'product_price' => '4.50',
                    'category_id' => 'K0001',
                    'product_img' => 'P0003.jpg',
                    'product_rating' => '0.0',
                ],

                [
                    'product_id' => 'P0004',
                    'product_name' => 'Nasi Goreng USA',
                    'product_price' => '5.00',
                    'category_id' => 'K0001',
                    'product_img' => 'P0004.jpg',
                    'product_rating' => '0.0',
                ],

                [
                    'product_id' => 'P0005',
                    'product_name' => 'Nasi Goreng Daging',
                    'product_price' => '4.50',
                    'category_id' => 'K0001',
                    'product_img' => 'P0005.jpg',
                    'product_rating' => '0.0',
                ],

                [
                    'product_id' => 'P0006',
                    'product_name' => 'Kuey Teow Goreng Ladna',
                    'product_price' => '4.00',
                    'category_id' => 'K0002',
                    'product_img' => 'P0006.jpg',
                    'product_rating' => '0.0',
                ],

                [
                    'product_id' => 'P0007',
                    'product_name' => 'Kuey Teow Goreng Kung Fu',
                    'product_price' => '4.00',
                    'category_id' => 'K0002',
                    'product_img' => 'P0007.jpg',
                    'product_rating' => '0.0',
                ],

                [
                    'product_id' => 'P0008',
                    'product_name' => 'Maggi Goreng',
                    'product_price' => '3.50',
                    'category_id' => 'K0002',
                    'product_img' => 'P0008.jpg',
                    'product_rating' => '0.0',
                ],

                [
                    'product_id' => 'P0009',
                    'product_name' => 'Mee Goreng Hailam',
                    'product_price' => '3.50',
                    'category_id' => 'K0002',
                    'product_img' => 'P0009.jpg',
                    'product_rating' => '0.0',
                ],

                [
                    'product_id' => 'P0010',
                    'product_name' => 'Mee Goreng Basah',
                    'product_price' => '4.00',
                    'category_id' => 'K0002',
                    'product_img' => 'P0010.jpg',
                    'product_rating' => '0.0',
                ],

                [
                    'product_id' => 'P0011',
                    'product_name' => 'Milo Ais',
                    'product_price' => '1.80',
                    'category_id' => 'K0003',
                    'product_img' => 'P0011.jpg',
                    'product_rating' => '0.0',
                ],

                [
                    'product_id' => 'P0012',
                    'product_name' => 'Teh O Ais',
                    'product_price' => '1.20',
                    'category_id' => 'K0003',
                    'product_img' => 'P0012.jpg',
                    'product_rating' => '0.0',
                ],

                [
                    'product_id' => 'P0013',
                    'product_name' => 'Teh Ais',
                    'product_price' => '1.50',
                    'category_id' => 'K0003',
                    'product_img' => 'P0013.jpg',
                    'product_rating' => '0.0',
                ],

                [
                    'product_id' => 'P0014',
                    'product_name' => 'Horlicks Ais',
                    'product_price' => '1.60',
                    'category_id' => 'K0003',
                    'product_img' => 'P0014.jpg',
                    'product_rating' => '0.0',
                ],

                [
                    'product_id' => 'P0015',
                    'product_name' => 'Mocha Ais',
                    'product_price' => '2.20',
                    'category_id' => 'K0003',
                    'product_img' => 'P0015.jpg',
                    'product_rating' => '0.0',
                ],

                [
                    'product_id' => 'P0016',
                    'product_name' => 'Kopi Panas',
                    'product_price' => '1.20',
                    'category_id' => 'K0004',
                    'product_img' => 'P0016.jpg',
                    'product_rating' => '0.0',
                ],

                [
                    'product_id' => 'P0017',
                    'product_name' => 'Teh O Panas',
                    'product_price' => '1.00',
                    'category_id' => 'K0004',
                    'product_img' => 'P0017.jpg',
                    'product_rating' => '0.0',
                ],

                [
                    'product_id' => 'P0018',
                    'product_name' => 'Teh Tarik',
                    'product_price' => '1.30',
                    'category_id' => 'K0004',
                    'product_img' => 'P0018.jpg',
                    'product_rating' => '0.0',
                ],

                [
                    'product_id' => 'P0019',
                    'product_name' => 'Limau Panas',
                    'product_price' => '1.00',
                    'category_id' => 'K0004',
                    'product_img' => 'P0019.jpg',
                    'product_rating' => '0.0',
                ],

                [
                    'product_id' => 'P0020',
                    'product_name' => 'Milo Panas',
                    'product_price' => '1.50',
                    'category_id' => 'K0004',
                    'product_img' => 'P0020.jpg',
                    'product_rating' => '0.0',
                ],
        ]);    
    }
}
 
