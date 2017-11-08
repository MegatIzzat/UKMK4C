<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Product extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('product', function(Blueprint $table){
            $table->string('product_id',5);
            $table->string('product_name',30);
            $table->float('product_price',4,2);
            $table->string('category_id',5);
            $table->string('product_img');
            $table->float('product_rating',2,1);

            $table->primary('product_id');
            $table->foreign('category_id')->references('category_id')->on('category');

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
        Schema::dropIfExists('product');

 }
}
