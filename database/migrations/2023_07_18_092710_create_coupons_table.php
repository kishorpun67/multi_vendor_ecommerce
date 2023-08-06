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
        Schema::create('coupons', function (Blueprint $table) {
            $table->id();
            $table->integer('vendor_id');
            $table->string('coupon_option')->null();
            $table->string('coupon_code')->null();
            $table->text('categories')->null();
            $table->text('users')->null();
            $table->text('brands')->null();
            $table->string('coupon_type')->null();
            $table->string('amount_type')->null();
            $table->float('amount')->null();
            $table->date('expiry_date')->null();
            $table->tinyInteger('status');
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
        Schema::dropIfExists('coupons');
    }
};
