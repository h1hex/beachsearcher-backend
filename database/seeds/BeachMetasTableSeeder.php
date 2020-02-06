<?php

use Illuminate\Database\Seeder;
use App\BeachMeta;

class BeachMetasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BeachMeta::create([
            'beach_id' => 1,
            'key' => 'address',
            'value' => 'Some address',
            'field_title' => 'Адрес'
        ]);

        BeachMeta::create([
            'beach_id' => 1,
            'key' => 'beach_distance_to_city',
            'value' => '100',
            'field_title' => 'Удаленность от ближайшего города'
        ]);

        BeachMeta::create([
            'beach_id' => 1,
            'key' => 'access_to_beach',
            'value' => 'Свободный путь',
            'field_title' => 'Тип доступа к пляжу',
        ]);
        BeachMeta::create([
            'beach_id' => 1,
            'key' => 'parking_distance',
            'value' => 200,
            'field_title' => 'Удаленность от парковки'
        ]);
    }
}
