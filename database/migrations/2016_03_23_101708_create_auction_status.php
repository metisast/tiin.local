<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAuctionStatus extends Migration
{
    /**
     * Auction status
     * 1. Waiting
     * 2. Active
     * 3. Finished
     * 4. FinishedNotOk
     * 5. Canceled
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products_auction_status', function (Blueprint $table) {
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
        Schema::drop('products_auction_status');
    }
}
