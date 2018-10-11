<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoryServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_services', function (Blueprint $table) {
            $table->increments('id');
            $table->string('slug')->unique();
            $table->unsignedTinyInteger('status')->default(0);
            $table->timestamps();
        });

        Schema::create('category_services_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('category_services_id');
            $table->char('lang', 2);
            $table->string('name', 80);
            $table->timestamps();
            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.category_services_translations
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('category_services');
        Schema::dropIfExists('category_services_translations');
    }
}
