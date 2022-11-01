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
        Schema::create('blood_orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('b_id')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('shipping_address');
            $table->string('phone');
            $table->string('email');
            $table->string('order_code');
            $table->string('order_status');
            $table->string('order_date');
            $table->string('total');
            $table->string('payment_mode');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('b_id')->references('id')->on('blood_banks');
            $table->foreign('user_id')->references('id')->on('users');
        });

        Schema::create('order_blood_pouch_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('bp_id')->nullable();
            $table->unsignedBigInteger('bo_id')->nullable();
            $table->string('price');
            $table->integer('quantity');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('bp_id')->references('id')->on('blood_pouches');
            $table->foreign('bo_id')->references('id')->on('blood_orders');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_blood_pouch_details');
        Schema::dropIfExists('blood_orders');
    }
};
