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
        Schema::create('orders_products', function (Blueprint $table) {
            $table->id();
            $table->integer('order_id');
            $table->integer('user_id');
            $table->integer('vendor_id')->NULL();
            $table->integer('admin_id')->null();
            $table->integer('product_id')->null();
            $table->string('product_name')->null();
            $table->string('product_code')->null();
            $table->string('product_color')->null();
            $table->string('product_size')->null();
            $table->string('product_price')->null();
            $table->string('product_qty')->null();
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
        Schema::dropIfExists('orders_products');
    }
};
