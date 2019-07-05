<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCourseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
		    $table->increments('id');
            $table->integer('semester_id');
		    $table->string('course_name');
		    $table->text('description')->nullable();
		    $table->date('started_at')->nullable();
		    $table->date('end_at')->nullable();
		    $table->integer('session_number');
		    $table->boolean('enabled')->default(true);
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
        Schema::drop('courses');
    }
}