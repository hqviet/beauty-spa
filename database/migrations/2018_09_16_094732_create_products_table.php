<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
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
            $table->unsignedInteger('category_id');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->integer('brand_id')->unsigned();    
            $table->foreign('brand_id')->references('id')->on('brands')->onDelete('cascade');
            $table->string('slug', 128)->unique();
            $table->string('price');
            $table->unsignedInteger('quantity');
            $table->string('image')->default('');
            $table->integer('enable')->default('1');
            $table->timestamps();
            $table->softDeletes();
        });
        Schema::create('product_trans', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 128);
            $table->unsignedInteger('product_id');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->string('lang');
            $table->longText('description');
            $table->timestamps();
            $table->softDeletes();
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
}
