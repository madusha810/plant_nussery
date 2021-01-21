<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminmanagewebsitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adminmanagewebsites', function (Blueprint $table) {
            $table->increments('id');
            $table->mediumText('image')->nullable();
            $table->string('firstparagraph')->nullable();
            $table->string('secondparagraph')->nullable();
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
        Schema::dropIfExists('adminmanagewebsites');
    }
}
