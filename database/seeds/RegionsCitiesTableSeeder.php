<?php

use Illuminate\Database\Seeder;

class RegionsCitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $regionsCities = [
            1 => [
                'Акколь',
                'Астана',
                'Атбасар',
                'Державинск',
                'Ерейментау',
                'Есиль',
                'Кокшетау',
                'Макинск',
                'Щучинск',
                'Степногорск',
                'Степняк'
            ],
            2 => [
                'Актобе',
                'АлгаЭмба',
                'Хромтау Кандыгаш',
                'Шалкар',
                'Темир',
                'Жем'
            ],
            3 => [
                'Алматы',
                'Есик',
                'Капчагай',
                'Каскелен',
                'Сарканд',
                'Талдыкорган',
                'Талгар',
                'Текели',
                'Ушарал',
                'Уштобе'
            ],
            4 => [
                'Атырау',
                'Кульсары'
            ],
            5 => [
                'Аягуз',
                'Чарск',
                'Курчатов',
                'Риддер',
                'Семей',
                'Серебрянск',
                'Шемонаиха',
                'Усть-Каменогорск',
                'Зайсан',
                'Зырьяновск'
            ],
            6 => [
                'Каратау',
                'Шу',
                'Тараз',
                'Жанатас',
                'Жаркент'
            ],
            7 => [
                'Аксай',
                'Уральск'
            ],
            8 => [
                'Абай',
                'Атасу',
                'Балхаш',
                'Караганда',
                'Каражал',
                'Каркаралинск',
                'Приозерск',
                'Сарань',
                'Сатпаев',
                'Шахтинск',
                'Темиртау',
                'Жезказган'
            ],
            9 => [
                'Аркалык',
                'Костанай',
                'Лисаковск',
                'Рудный',
                'Житикара'
            ],
            10 => [
                'Аральск',
                'Байконур',
                'Казалинск',
                'Кызылорда'
            ],
            11 => [
                'Актау',
                'Форт-Шевченко',
                'Жанаозен'
            ],
            12 => [
                'Аксу',
                'Экибастуз',
                'Павлодар'
            ],
            13 => [
                'Булаево',
                'Мамлютка',
                'Петропавлоск',
                'Сергеевка',
                'Тайынша'
            ],
            14 => [
                'Кентау',
                'Ленгер',
                'Шардара',
                'Шымкент',
                'Туркестан',
                'Жетысай'
            ]
        ];

        foreach ($regionsCities as $key => $value)
        {
            for($i = 0; $i < count($value); $i++)
            {
                DB::table('regions_city')->insert([
                    'region_id' => $key,
                    'title' => $value[$i],
                    'created_at' => \Carbon\Carbon::now(),
                    'updated_at' => \Carbon\Carbon::now()
                ]);
            }

        }
    }
}
