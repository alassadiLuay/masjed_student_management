<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->increments('id');
            $table->string('student_fname');
            $table->string('student_lname');
            $table->string('student_father_name');
            $table->string('student_address');
            $table->string('student_father_job');
            $table->string('student_nationality');
            $table->string('father_phone');
            $table->string('student_phone');
            $table->string('home_phone');
            $table->string('transportation');
            $table->string('student_photo');
            $table->string('note');
            $table->boolean('status')->default(true);
            $table->boolean('has_id')->default(true);
            $table->date('student_birthdate')->nullable();
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
        Schema::drop('students');
    }
}