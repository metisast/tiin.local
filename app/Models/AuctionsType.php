<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AuctionsType extends Model
{
    protected $table = 'auctions_type';

    public static function getAuctionsType()
    {
        return self::all();
    }
}
