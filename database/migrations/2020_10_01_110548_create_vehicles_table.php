<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehiclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('updated_by');
            $table->string('vehicle_type');
            $table->string('no_of_seats');
            $table->string('base_fare');
            $table->string('mini_fare');
            $table->string('booking_fee');
            $table->string('tax_percentage');
            $table->string('price_minute');
            $table->string('price_mile');
            $table->string('mile_kms');
            $table->string('picture');
            $table->string('status');
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
        Schema::dropIfExists('vehicles');
    }
}
