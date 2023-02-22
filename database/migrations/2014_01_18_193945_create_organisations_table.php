<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('organisations', function (Blueprint $table) {
            $table->id();
            $table->string('organisation_name',255);
             //for students
           
             $table->string('address')->nullable(true);
             $table->string('city',50)->nullable(true);
             $table->string('district',50)->nullable(true);
             $table->string('pin',8)->nullable(true);
             $table->string('contact_number',15)->nullable(true);
             $table->string('whatsapp_number',15)->nullable(true);
             $table->string('email_id',255)->nullable(true);
           
             //for Bank only
             $table->String('branch', 100)->nullable(true);
             $table->String('account_number', 30)->nullable(true);
             $table->String('ifsc', 20)->nullable(true);
             $table->String('gst_no', 50)->nullable(true);
             //for opening balance
             
             $table->decimal('opening_balance')->default(0);
 
             $table->tinyInteger('inforce')->default('1');
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
        Schema::dropIfExists('organisations');
    }
};
