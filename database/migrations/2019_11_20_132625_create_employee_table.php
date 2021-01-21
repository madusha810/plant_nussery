<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {  
           Schema::create('employees',function (Blueprint $table){
               $table->increments('id');
               $table->string('name');
               $table->string('dob');
               $table->string('email');
               $table->integer('pno');
               $table->string('address');
               $table->string('gender');               
               $table->string('experience');
               $table->mediumText('image')->nullable();
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
        //
    }
}
