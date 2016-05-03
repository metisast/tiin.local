<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Product extends Model
{
    public function images()
    {
        return $this->hasMany('App\Models\ProductsImages');
    }

    public function image()
    {
        return $this->hasMany('App\Models\ProductsImages')->where('main', '=', true)->first();
    }

    public static function getProductsByUser()
    {
        return self::where('user_id', '=', Auth::user()->id)->orderBy('id', 'DESC')->get();
    }

    public static function getProductById($id)
    {
        return self::where([
            ['user_id', '=', Auth::user()->id],
            ['id', '=', $id]
        ])->firstOrFail();
    }
}
