<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCourseUnitsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('course_units', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->indexedInteger('faculty_id');
            $table->indexedInteger('intake_id');
            $table->string('code', 10)->unique();
            $table->string('lecturer')->nullable();
            $table->tinyInteger('creditUnits')->unsigned();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('course_units');
    }
}
