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
            $table->integer('faculty_id')->unsigned()->index();
            user_id_field($table);
            semester_id_field($table);
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
