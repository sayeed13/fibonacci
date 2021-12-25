<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('overview');
            $table->string('bedrooms')->nullable();
            $table->string('bathrooms')->nullable();
            $table->longText('why_buy');
            $table->longText('description');
            $table->unsignedBigInteger('price');
            $table->unsignedBigInteger('saleOrRent')->default('1')->comment('0=rent, 1=sale');
            $table->unsignedBigInteger('type')->default('1')->comment('0=land, 1=apartment, 2=villa');
            $table->string('featured_image');
            $table->unsignedBigInteger('location_id');
            //$table->foreign('featured_media_id')->references('id')->on('media')->cascadeOnUpdate();
            $table->foreign('location_id')->references('id')->on('locations');

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
        Schema::dropIfExists('properties');
    }
}
