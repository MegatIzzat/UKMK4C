<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class Orderline extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('orderline', function(Blueprint $table){
            $table->increments('id');
            $table->string('order_id',10);
            $table->string('product_id',5);
            $table->integer('quantity');
            $table->integer('rating_id')->nullable();


            $table->foreign('order_id')->references('order_id')->on('order');
            $table->foreign('product_id')->references('product_id')->on('product');

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
                Schema::dropIfExists('orderline');
    }
}