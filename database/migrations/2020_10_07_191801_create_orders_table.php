<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('user_id');
            $table->string('name');
            $table->string('product_name');
            $table->string('product_id');
            $table->string('image');
            $table->string('mobile');
            $table->string('delivery_charge');
            $table->string('total');
            $table->string('tax');
            $table->string('discount');
            $table->string('qty');
            $table->string('final_total');
            $table->string('promo_code');
            $table->string('deliver_by');
            $table->string('payment_method');
            $table->string('address');
            $table->string('delivery_time');
            $table->string('active_status');
            $table->string('date_added');
            $table->string('latitude');
            $table->string('longitude');
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
        Schema::dropIfExists('orders');
    }
}
