<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsState extends Migration
{
    /**
     * Products state
     * 1. New
     * 2. UsedNew
     * 3. Restore
     * 4. Used
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products_status_state', function (Blueprint $table) {
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
        Schema::drop('products_status_state');
    }
}
