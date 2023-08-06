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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('name');
            $table->string('address')->null();
            $table->string('city')->null();
            $table->string('state')->null();
            $table->string('country')->null();
            $table->string('pincode')->null();
            $table->string('mobile')->null();
            $table->string('email')->null();
            $table->float('shipping_charges')->null();
            $table->float('coupon_amount')->null();
            $table->string('coupon_code')->null();
            $table->string('order_status')->null();
            $table->string('payment_method')->null();
            $table->string('payment_geteway')->null();
            $table->float('grand_total')->null();
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
};
