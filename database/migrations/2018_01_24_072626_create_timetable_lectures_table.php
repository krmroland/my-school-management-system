<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTimetableLecturesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('timetable_lectures', function (Blueprint $table) {
            $table->increments('id');
            $table->indexedInteger('intake_id');
            $table->indexedInteger('course_unit_id');
            $table->string('day', 10);
            $table->tinyInteger('hour')->unsigned();
            $table->char('dayTime', 2);
            $table->string('venue');
            $table->unique(
                ['day', 'venue', 'hour', 'course_unit_id']
            );
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('timetable_lectures');
    }
}
