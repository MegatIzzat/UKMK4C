<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Customer;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
	    $cust = Customer::all()->pluck('cust_id')->all();
	    foreach (range(1,10000) as $index) {
	      DB::table('order')->insert([
	        'order_id' => $faker->unique()->numerify('OD########'),
	        'cust_id' => $faker->randomElement($cust),
	        'total_price' => $faker->numberBetween($min = 4, $max = 10),
	        'order_status' => 'Completed',
	        'order_date' => $faker->dateTimeBetween($startDate = '-7 years', $endDate = 'now'),
            'order_completed' => $faker->dateTimeBetween($startDate = '-7 years', $endDate = 'now'),
	      ]);
	    }
    }
}
