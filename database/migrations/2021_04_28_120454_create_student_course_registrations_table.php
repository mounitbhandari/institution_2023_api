<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateStudentCourseRegistrationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_course_registrations', function (Blueprint $table) {
            $table->id();
            $table->string('reference_number')->nullable(false)->unique();
            //adding student reference
            $table->foreignId('ledger_id')->nullable(false)->references('id')->on('ledgers')->onDelete('cascade');
            //adding course
            $table->foreignId('course_id')->nullable(false)->references('id')->on('courses')->onDelete('cascade');
            //fees actual
            $table->integer('base_fee')->default(0);

            //discount allowed
            $table->integer('discount_allowed')->default(0);

            $table->date('joining_date')->nullable(false);
            $table->date('effective_date')->nullable(true);
            $table->date('completion_date')->nullable(true);

            //actual duration
            $table->integer('actual_course_duration')->default(0);
            $table->foreignId('duration_type_id')->default(1)->references('id')->on('duration_types')->onDelete('cascade');

            $table->boolean('is_started')->default(false);
            $table->boolean('is_completed')->default(false);

             // create organisation Foreign Key
             $table->bigInteger('organisation_id')->unsigned()->default(1);
             $table ->foreign('organisation_id')->references('id')->on('organisations');

            // create unique key
           // $table->unique('ledger_id','course_id','organisation_id');

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
        Schema::dropIfExists('student_course_registrations');
    }
}
