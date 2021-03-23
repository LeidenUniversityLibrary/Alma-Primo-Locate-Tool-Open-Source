<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBuildingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('buildings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('building_name')->unique();
            $table->string('building_id', 5)->unique();
            $table->string('building_country');
            $table->string('building_city');
            $table->string('building_zip');
            $table->string('building_street');
            $table->string('building_number');
            $table->text('embed_google_map')->nullable();
            $table->text('building_description')->nullable();
            $table->nullableTimestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('buildings');
    }
}
