<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Advertisement extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('advertisement', function(Blueprint $table){
            $table->string('advertisement_id',5);
            $table->string('advertisement_name');
            $table->string('advertisement_img');
            $table->string('staff_id',7);

            $table->primary('advertisement_id');
            $table->foreign('staff_id')->references('staff_id')->on('staff');
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
        Schema::dropIfExists('advertisement');
    }
}
