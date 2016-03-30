<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAuctionsType extends Migration
{
    /**
     * Auction type
     * 1. Up
     * 2. Down
     *
     * @return void
     */
    public function up()
    {
        Schema::create('auctions_type', function (Blueprint $table) {
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
        Schema::drop('auctions_type');
    }
}
