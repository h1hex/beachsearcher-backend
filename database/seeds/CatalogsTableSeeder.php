<?php

use Illuminate\Database\Seeder;
use App\Catalog;

class CatalogsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Catalog::create([
            'name' => 'sharks',
            'label' => 'sharks',
        ]);
        Catalog::create([
            'parent_id' => 1,
            'name' => 'sharks',
            'value' => 'Yes'
        ]);
        Catalog::create([
            'parent_id' => 1,
            'name' => 'sharks',
            'value' => 'No'
        ]);
        Catalog::create([
            'parent_id' => 1,
            'name' => 'sharks',
            'value' => 'Unknown'
        ]);


        Catalog::create([
            'name' => 'tide',
            'label' => 'Tide',
        ]);
        Catalog::create([
            'parent_id' => 5,
            'name' => 'tide',
            'value' => 'Yes'
        ]);
        Catalog::create([
            'parent_id' => 5,
            'name' => 'tide',
            'value' => 'No'
        ]);
        Catalog::create([
            'parent_id' => 5,
            'name' => 'tide',
            'value' => 'Unknown'
        ]);
    }
}
