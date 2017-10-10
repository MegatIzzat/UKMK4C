<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Order extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('order', function(Blueprint $table){
            $table->string('order_id',5);
            $table->string('cust_id',5);
            $table->string('staff_id',5);
            $table->string('order_status');

            $table->primary('order_id');
            $table->foreign('cust_id')->references('cust_id')->on('customer');
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
                Schema::dropIfExists('order');

    }
}

