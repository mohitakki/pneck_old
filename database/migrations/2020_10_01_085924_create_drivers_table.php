<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDriversTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drivers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('corporation');
            $table->string('service');
            $table->string('email');
            $table->string('contact');
            $table->string('gender');
            $table->string('plate_no');
            $table->string('model');
            $table->string('color');
            $table->string('address');
            $table->string('image');
            $table->string('car');
            $table->string('password');
            $table->string('cpassword');
            $table->string('description');
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
        Schema::dropIfExists('drivers');
    }
}
