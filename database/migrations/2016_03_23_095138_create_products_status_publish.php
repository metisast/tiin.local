<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsStatusPublish extends Migration
{
    /**
     * Products status publish
     * 1. Not publish
     * 2. Publish
     * 3. Archive
     * 4. Deleted
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products_status_publish', function (Blueprint $table) {
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
        Schema::drop('products_status_publish');
    }
}
