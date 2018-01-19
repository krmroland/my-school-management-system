<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLecturesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('lectures', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('course_unit_id')->unsigned()->index();
            $table->tinyInteger('day')->unsigned();
            $table->timestamp('time');
            $table->string('venue');
            $table->unique(
                ['day', 'venue', 'time', 'course_unit_id']
            );
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('lectures');
    }
}
