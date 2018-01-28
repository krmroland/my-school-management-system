<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTimeTablesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('time_table', function (Blueprint $table) {
            $table->increments('id');
            $table->indexedInteger('intake_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('time_table');
    }
}
