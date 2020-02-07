<?php

use Illuminate\Database\Seeder;
use App\BeachValue;

class BeachValuesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BeachValue::create([
            'beach_id' => 1,
            'param_id' => 1,
            'double' => 4.5
        ]);
    }
}
