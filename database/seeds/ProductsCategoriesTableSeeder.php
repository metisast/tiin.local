<?php

use Illuminate\Database\Seeder;

class ProductsCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            'Недвижимость',
            'Детский мир',
            'Транспорт',
            'Работа',
            'Животные',
            'Дом и сад',
            'Электроника',
            'Бизнес и услуги',
            'Мода и стиль',
            'Хобби, отдых и спорт',
            'Отдам даром',
            'Обмен'
        ];
        for($i = 0; $i < count($categories); $i++)
        {
            DB::table('products_categories')->insert([
                'title' => $categories[$i],
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ]);
        }
    }
}
