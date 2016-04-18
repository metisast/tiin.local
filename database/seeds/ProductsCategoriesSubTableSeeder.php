<?php

use Illuminate\Database\Seeder;

class ProductsCategoriesSubTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $catSub = [
            1 =>[
                'Аренда квартир',
                'Аренда комнат',
                'Аренда домов',
                'Аренда земли',
                'Аренда гаражей / стоянок',
                'Ищу компаньона',
                'Продажа квартир',
                'Продажа комнат',
                'Продажа домов',
                'Продажа земли',
                'Продажа гаражей / стоянок',
                'Аренда помещений',
                'Продажа помещений',
                'Прочая недвижимость',
                'Обмен недвижимости'
            ],
            2 =>[
                'Детская одежда',
                'Детская обувь',
                'Детские коляски',
                'Детские автокресла',
                'Детская мебель',
                'Игрушки',
                'Детский транспорт',
                'Товары для кормления',
                'Товары для школьников',
                'Прочие детские товары'
            ],
            3 =>[
                'Легковые автомобили',
                'Мото',
                'Автобусы',
                'Спецтехника',
                'Грузовые автомобили',
                'Сельхозтехника',
                'Водный транспорт',
                'Воздушный транспорт',
                'Запчасти / аксессуары',
                'Прицепы',
                'Другой транспорт',
            ],
            4 =>[
                'Розничная торговля / Продажи',
                'Транспорт / логистика',
                'Строительство',
                'Бары / рестораны',
                'Юриспруденция и бухгалтерия',
                'Охрана / безопасность',
                'Домашний персонал',
                'Красота / фитнес / спорт',
                'Туризм / отдых / развлечения',
                'Образование',
                'Культура / искусство',
                'Медицина / фармация',
                'ИТ / телеком / компьютеры',
                'Недвижимость',
                'Маркетинг / реклама / дизайн',
                'Производство / энергетика',
                'Cекретариат / АХО',
                'Начало карьеры / Студенты',
                'Сервис и быт',
                'Другие сферы занятий'
            ],
            5 =>[
                'Собаки',
                'Кошки',
                'Аквариумистика',
                'Птицы',
                'Грызуны',
                'Рептилии',
                'Сельхоз животные',
                'Зоотовары',
                'Вязка',
                'Бюро находок',
                'Другие животные'
            ],
            6 =>[
                'Канцтовары / расходные материалы',
                'Мебель',
                'Продукты питания / напитки',
                'Предметы интерьера',
                'Строительство / ремонт',
                'Инструменты',
                'Комнатные растения',
                'Посуда / кухонная утварь',
                'Садовый инвентарь',
                'Сад / огород',
                'Хозяйственный инвентарь/бытовая химия',
                'Прочие товары для дома'
            ],
            7 =>[
                'Телефоны',
                'Компьютеры',
                'Фото / видео',
                'Тв / видеотехника',
                'Аудиотехника',
                'Игры и игровые приставки',
                'Техника для дома',
                'Техника для кухни',
                'Климатическое оборудование',
                'Индивидуальный уход',
                'Аксессуары и комплектующие',
                'Прочая электроника'
            ],
            8 =>[
                'Строительство / ремонт / уборка',
                'Финансовые услуги / партнерство',
                'Перевозки / аренда транспорта',
                'Реклама / полиграфия / маркетинг / интернет',
                'Няни / сиделки',
                'Сырьё / материалы',
                'Красота / здоровье',
                'Оборудование',
                'Образование / Спорт',
                'Услуги для животных',
                'Продажа бизнеса',
                'Развлечение / Искусство / Фото / Видео',
                'Туризм / иммиграция',
                'Услуги переводчиков / набор текста',
                'Авто / мото услуги',
                'Обслуживание, ремонт техники',
                'Сетевой маркетинг',
                'Юридические услуги',
                'Прокат товаров',
                'Прочие услуги'
            ],
            9 =>[
                'Одежда/обувь',
                'Для свадьбы',
                'Мода разное',
                'Наручные часы',
                'Аксессуары',
                'Подарки',
                'Красота / здоровье'
            ],
            10 =>[
                'Антиквариат / коллекции',
                'Музыкальные инструменты',
                'Другое',
                'Спорт / отдых',
                'Книги / журналы',
                'CD / DVD / пластинки / кассеты',
                'Билеты',
                'Поиск попутчиков',
                'Поиск групп / музыкантов'
            ],
            11 =>[
                'Детский мир',
                'Животные',
                'Дом и сад',
                'Электроника',
                'Бизнес и услуги',
                'Мода и стиль',
                'Хобби, отдых и спорт'
            ],
            12 =>[
                'Детский мир',
                'Транспорт',
                'Животные',
                'Дом и сад',
                'Электроника',
                'Бизнес и услуги',
                'Мода и стиль',
                'Хобби, отдых и спорт'
            ]
        ];

        foreach ($catSub as $key => $value)
        {
            for($i = 0; $i < count($value); $i++)
            {
                DB::table('products_categories_sub')->insert([
                    'category_id' => $key,
                    'title' => $value[$i],
                    'created_at' => \Carbon\Carbon::now(),
                    'updated_at' => \Carbon\Carbon::now()
                ]);
            }

        }
    }
}