<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('locations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('building_id');
            $table->string('location_id')->unique(); /* must come from Alma API, must be unique */
            $table->string('location_name')->unique(); /* must come from Alma API */
            $table->string('location_name_override')->unique()->nullable();
            $table->string('location_additional_info')->nullable();
            $table->string('location_additional_info_link')->nullable();
            $table->string('room_name')->nullable();
            $table->string('location_floor');
            $table->text('location_map')->nullable();
            $table->text('location_description')->nullable();
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
        Schema::dropIfExists('locations');
    }
}
