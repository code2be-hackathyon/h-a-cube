<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSessionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sessions', function (Blueprint $table){
            $table->integerIncrements('id');
            $table->integer('courses_id');
            $table->string('title');
            $table->date('date');
            $table->string('startedHour');
            $table->string('endedHour');
            $table->integer('user_id');
            $table->string('description');
            $table->integer('nbMaxUsers');
            $table->integer('difficulty');
            $table->string('room');
            $table->dateTime('updated_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sessions');
    }
}
