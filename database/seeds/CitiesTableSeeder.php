<?php

use Illuminate\Database\Seeder;
use App\City;

class CitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        City::create([
            'city' => 'Сантадер',
            'lat' => 43.47,
            'lon' => -3.78
        ]);
    }
}
