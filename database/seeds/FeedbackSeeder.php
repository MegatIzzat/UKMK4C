<?php

use Illuminate\Database\Seeder;

class FeedbackSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Feedback::insert([

                [
                    'feedback_id' => 'F0001',
                    'feedback_comment' => 'Great job.',
                    'order_id' => 'B0001',
                ],

                [
                    'feedback_id' => 'F0002',
                    'feedback_comment' => 'Delicious foods!',
                    'order_id' => 'B0002',
                ]


        ]);    }
}
