<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeacherTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teachers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('teacher_name');
            $table->string('teacher_address');
            $table->string('teacher_study');
            $table->string('teacher_speciality');
            $table->string('teacher_work');
            $table->string('teacher_extras');
            $table->string('teacher_note');
            $table->string('teacher_mobile');
            $table->string('teacher_phone');
            $table->date('birthdate')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('teachers');
    }
}