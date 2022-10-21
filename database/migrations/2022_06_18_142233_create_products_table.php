<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Categories;
use App\Models\User;
use App\Models\Brands;
use App\Models\Subcategories;
return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->foreignIdFor(Categories::class,'categories_id');
            $table->foreignIdFor(User::class,'users_id');
            $table->foreignIdFor(Brands::class,'brands_id');
            $table->foreignIdFor(Subcategories::class, 'sub_id');
            $table->string('size')->nullable();
            $table->float('price',0)->nullable();
            $table->float('price_new',0)->nullable();
            $table->integer('quantity')->nullable();      
            $table->string('image')->nullable();
            $table->string('link')->nullable();
            $table->longtext('content')->nullable();
            $table->integer('featured_product')->default(0);
            $table->integer('active')->default(1);
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
        Schema::dropIfExists('products');
    }
};
