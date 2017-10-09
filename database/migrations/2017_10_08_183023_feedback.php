<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Feedback extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('feedback', function(Blueprint $table){
            $table->string('feedback_id',5);
            $table->string('feedback_comment');
            $table->string('order_id', 5);

            $table->primary('feedback_id');
            $table->foreign('order_id')->references('order_id')->on('order');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('feedback');

    }
}