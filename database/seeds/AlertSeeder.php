<?php

use Illuminate\Database\Seeder;
use App\Alert;

class AlertSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Alert::class)->create();
    }
}
