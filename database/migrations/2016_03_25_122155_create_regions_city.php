<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegionsCity extends Migration
{
    /**
     * Region cities
     *
     * @return void
     */
    public function up()
    {
        Schema::create('regions_city', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('region_id');
            $table->string('title');
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
        Schema::drop('regions_city');
    }
}
