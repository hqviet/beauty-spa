<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->increments('id');
            $table->string('slug')->unique();
            $table->unsignedInteger('category_service_id')->nullable();
            $table->foreign('category_service_id')->references('id')->on('category_services')->onDelete('cascade');
            $table->string('image', 255)->nullable();
            $table->float('price')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('services_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('services_id');
            $table->char('lang', 2);
            $table->string('name');
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
        Schema::dropIfExists('services');
        Schema::dropIfExists('services_translations');
    }
}
