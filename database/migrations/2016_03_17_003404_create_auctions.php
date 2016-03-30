<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAuctions extends Migration
{
    /**
     * Auction
     *
     * @return void
     */
    public function up()
    {
        Schema::create('auctions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('product_id');
            $table->integer('start_price');
            $table->integer('min_price');
            $table->tinyInteger('type');//1.up 2.down +
            $table->timestamp('start');
            $table->timestamp('finish');
            $table->tinyInteger('status');//1.waiting, 2.active, 3.finished, 4.finishedNotOk, 5.canceled +
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
        Schema::drop('auctions');
    }
}
