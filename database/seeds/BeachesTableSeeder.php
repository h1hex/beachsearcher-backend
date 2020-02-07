<?php

use Illuminate\Database\Seeder;
use App\Beach;

class BeachesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Beach::create([
            'title' => 'Тестовый пляж',
            'lat' => 43.47,
            'lon' => -3.78,
            'city_id' => 1
        ]);
        Beach::create([
            'title' => 'Тестовый пляж 2',
            'lat' => 43.47,
            'lon' => -3.78,
            'city_id' => 1
        ]);
    }
}
