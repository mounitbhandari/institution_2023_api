<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubjecToCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subjec_to_courses', function (Blueprint $table) {
            $table->id();

            //adding courses reference
            $table->bigInteger('course_id')->unsigned();
            $table ->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');

            //adding subjects reference
            $table->bigInteger('subject_id')->unsigned();
            $table ->foreign('subject_id')->references('id')->on('subjects')->onDelete('cascade');

            $table->unique(["course_id", "subject_id"], 'course_subject_unique');

            $table->tinyInteger('inforce')->default('1');

             // create organisation Foreign Key
             $table->bigInteger('organisation_id')->unsigned()->default(1);
             $table ->foreign('organisation_id')->references('id')->on('organisations');
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
        Schema::dropIfExists('subjec_to_courses');
    }
}
