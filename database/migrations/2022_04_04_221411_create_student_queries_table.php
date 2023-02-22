<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentQueriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_queries', function (Blueprint $table) {
            $table->id();
            $table->string('student_name', 50)->nullable(true);
            $table->string('address', 100)->nullable(true);
            $table->string('father_name', 50)->nullable(true);
            $table->string('mother_name', 50)->nullable(true);
            $table->string('guardian_name', 50)->nullable(true);
            $table->string('relation_to_guardian', 50)->nullable(true);
            $table->string('educational_institution', 50)->nullable(true);
            $table->string('phone_number', 50)->nullable(true);
            $table->string('query', 50)->nullable(true);

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
        Schema::dropIfExists('student_queries');
    }
}
