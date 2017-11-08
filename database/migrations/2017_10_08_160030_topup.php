<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Topup extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('topup', function(Blueprint $table){
            $table->string('cust_id',7);
            $table->string('staff_id',7);
            $table->timestamp('log_time');
            $table->float('amount',5,2);

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
        Schema::dropIfExists('topup');

    }
}
