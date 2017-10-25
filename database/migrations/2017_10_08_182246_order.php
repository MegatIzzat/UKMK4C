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
            $table->string('order_id',10);
            $table->string('cust_id',7);
            $table->string('order_status');
            $table->timestamp('order_date')->nullable();
            $table->timestamp('order_modified')->nullable();

            $table->primary('order_id');
            $table->foreign('cust_id')->references('cust_id')->on('customer');
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

