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
        $this->call([
            BuildingsTableSeeder::class,
            LocationsTableSeeder::class,
            AdminTableSeeder::class,
            AlertSeeder::class,
            OptionSeeder::class,
        ]);
    }
}
