<?php

use Illuminate\Database\Seeder;
use App\Building;

class BuildingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Building::class)->create();
    }
}
