<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAuctionsBet extends Migration
{
    /**
     * Auction bets
     *
     * @return void
     */
    public function up()
    {
        Schema::create('auctions_bet', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('auction_id');
            $table->integer('user_id');
            $table->integer('value');
            $table->bigInteger('bet_time');
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
        Schema::drop('auctions_bet');
    }
}
