<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    public static function getRegions()
    {
        return self::select('id', 'title')->get();
    }
}
