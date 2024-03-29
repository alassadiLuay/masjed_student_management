<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateListenedSubjectTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('listened_subjects', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('student_id');
            $table->integer('student_course_id');
            $table->integer('subject_id');
            $table->string('subject_type');
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
        Schema::drop('listened_subjects');
    }
}