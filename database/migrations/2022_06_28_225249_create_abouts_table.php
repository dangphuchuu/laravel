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
        Schema::create('abouts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('icon');
            $table->string('logo');
            $table->string('name')->nullable();
            $table->string('title')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('address')->nullable();
            $table->string('linkfanpage')->nullable();
            $table->string('copyright')->nullable();
            $table->string('worktime')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('abouts');
    }
};
