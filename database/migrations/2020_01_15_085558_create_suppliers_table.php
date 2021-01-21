<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSuppliersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suppliers',function (Blueprint $table){
            $table->increments('id');
            $table->string('name');
            $table->string('email');
            $table->integer('pno');
            $table->string('address');               
            $table->string('plantname');
            $table->string('plantprice');
            $table->string('quantity');
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
