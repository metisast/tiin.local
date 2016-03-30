<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsCategoriesRelate extends Migration
{
    /**
     * Products relation of category subclasses
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products_categories_relate', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('product_id');
            $table->integer('category_sub_id');
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
        Schema::drop('products_categories_relate');
    }
}
