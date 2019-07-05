<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAwqafStudentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('awqaf_students', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('student_id');
            $table->integer('awqaf_id');
            $table->string('student_mark');
            $table->boolean('is_passed');
            $table->string('full_mark');
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
        Schema::drop('awqaf_student');
    }
}