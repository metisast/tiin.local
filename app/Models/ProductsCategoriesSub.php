<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductsCategoriesSub extends Model
{
    protected $table = 'products_categories_sub';

    public static function getCategoriesSubByCat($id)
    {
        return self::where('category_id', '=', $id)->get();
    }
}
