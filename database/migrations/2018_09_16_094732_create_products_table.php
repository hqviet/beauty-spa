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
            $table->string('name', 128)->unique();
            $table->string('slug', 128)->unique();
            $table->integer('brand_id')->unsigned();    
            $table->foreign('brand_id')->references('id')->on('brands')->onDelete('cascade');
            $table->string('price');
            $table->unsignedInteger('quantity');
            $table->string('image')->default('');
            $table->integer('enable')->default('1');
            $table->longText('desc_en');
            $table->longText('desc_vi')->nullable();
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
