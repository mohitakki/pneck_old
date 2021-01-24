<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('fk_category_id')->nullable();
            $table->text('image')->nullable();
            $table->string('name','50')->nullable();
            $table->decimal('mrp',5, 4)->nullable();
            $table->decimal('selling_price',5, 4)->nullable();
            $table->decimal('per_piece_price',5, 4)->nullable();
            $table->integer('number_of_piece')->nullable();
            $table->text('details')->nullable();
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
        Schema::dropIfExists('tbl_products');
    }
}
