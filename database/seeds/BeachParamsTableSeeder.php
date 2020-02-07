<?php

use Illuminate\Database\Seeder;
use App\BeachParam;

class BeachParamsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BeachParam::create([
            'type' => 'double',
            'name' => 'rating',
            'label' => 'Рейтинг',
            'label_type' => 'number'
        ]);
        BeachParam::create([
            'type' => 'string',
            'name' => 'location',
            'label' => 'Расположение',
            'label_type' => 'text'
        ]);
        BeachParam::create([
            'type' => 'string',
            'name' => 'specifications',
            'label' => 'Характеристика',
            'label_type' => 'text'
        ]);
        BeachParam::create([
            'type' => 'string',
            'name' => 'video_url',
            'label' => 'Видео (ссылка на ютуб)',
            'label_type' => 'text'
        ]);
        BeachParam::create([
            'type' => 'string',
            'name' => 'length',
            'label' => 'Длина',
            'label_type' => 'text'
        ]);
        BeachParam::create([
            'type' => 'double',
            'name' => 'width',
            'label' => 'Ширина',
            'label_type' => 'number'
        ]);
        BeachParam::create([
            'type' => 'double',
            'name' => 'quality_beach',
            'label' => 'Качество пляжа',
            'label_type' => 'number'
        ]);
        BeachParam::create([
            'type' => 'double',
            'name' => 'quality_water',
            'label' => 'Качество воды',
            'label_type' => 'number'
        ]);
        BeachParam::create([
            'type' => 'string',
            'name' => 'cover',
            'label' => 'Покрытие пляжа',
            'label_type' => 'text'
        ]);
        BeachParam::create([
            'type' => 'string',
            'name' => 'other_specifications',
            'label' => 'Остальные характеристики',
            'label_type' => 'text'
        ]);
    }
}
