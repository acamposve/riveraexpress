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
        //
        Schema::create('pos', function (Blueprint $table) {
        $table->id();
        $table->string('product_name');
        $table->string('product_price');

        $table->integer('product_id');
        $table->integer('product_quantity');
        $table->string('sub_total');
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
};
