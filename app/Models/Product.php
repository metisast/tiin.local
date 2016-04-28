<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Product extends Model
{
    public static function getProductsById()
    {
        return self::where('user_id', '=', Auth::user()->id)->orderBy('id', 'DESC')->get();
    }
}
