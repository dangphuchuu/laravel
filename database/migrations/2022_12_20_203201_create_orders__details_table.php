<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders__details', function (Blueprint $table) {
            $table->unsignedInteger('orders_id');
            $table->unsignedInteger('product_id');
            $table->string('name');
            $table->string('image');
            $table->integer('quantity');
            $table->integer('price');
            $table->timestamps();

            $table->foreign('orders_id')->references('id')->on('orders')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders__details');
    }
};
