<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call(UsersTableSeeder::class);
         $this->call(CitiesTableSeeder::class);
         $this->call(BeachesTableSeeder::class);
         $this->call(BeachParamsTableSeeder::class);
         $this->call(BeachValuesTableSeeder::class);
         $this->call(CatalogsTableSeeder::class);
    }
}
