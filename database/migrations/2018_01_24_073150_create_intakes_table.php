<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIntakesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('intakes', function (Blueprint $table) {
            $table->increments('id');
            $table->indexedInteger('user_id');
            $table->indexedInteger('semester_id');
            $table->unique(['user_id', 'semester_id']);
            $table->boolean('is_active')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('intakes');
    }
}
