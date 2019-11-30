<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->integerIncrements('id');
            $table->string('firstname');
            $table->string('lastname');
            $table->integer('age');
            $table->integer('usertype_id')->unsigned();
            $table->foreign('usertype_id')->references('id')->on('usertypes');
            $table->string('phone');
            $table->string('email');
            $table->string('password');
            $table->string('token');
            $table->integer('etablissement_id')->unsigned();
            $table->foreign('etablissement_id')->references('id')->on('etablissements');
            $table->boolean('isAllowedToCreateCourse');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
