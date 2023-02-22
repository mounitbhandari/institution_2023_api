<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBijoyaRegistrationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bijoya_registrations', function (Blueprint $table) {
            $table->id();
            $table->string('student_name',50)->nullable(false);
            $table->string('email',50);
            $table->string('contact_number',12)->nullable(false);
            $table->string('whatsapp_number',10);
            $table->string('telegram_number',10);
            $table->integer('member_number');

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
        Schema::dropIfExists('bijoya_registrations');
    }
}
