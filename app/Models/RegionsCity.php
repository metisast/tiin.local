<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RegionsCity extends Model
{
    protected $table = 'regions_city';

    public static function getCitiesByRegion($id)
    {
        return self::where('region_id', '=', $id)->get();
    }
}
