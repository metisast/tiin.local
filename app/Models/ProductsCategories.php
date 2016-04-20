<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductsCategories extends Model
{
    protected $table = 'products_categories';

    public static function getCategories()
    {
        return self::select('id', 'title')->get();
    }
}
