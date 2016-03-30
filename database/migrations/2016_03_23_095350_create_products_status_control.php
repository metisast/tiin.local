<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsStatusControl extends Migration
{
    /**
     * Products control status
     * 1. Not checked
     * 2. CheckedOk
     * 3. CheckedNotOk
     * 4. Denied
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products_status_control', function (Blueprint $table) {
            $table->increments('id');
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
        Schema::drop('products_status_control');
    }
}
