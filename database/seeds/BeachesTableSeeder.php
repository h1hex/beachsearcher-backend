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
            'rating' => 4.5,
            'location' => 'Расположен в центре города',
            'specifications' => 'Best for kids',
            'city_id' => 1
        ]);
    }
}
