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
        Schema::create('delivery_addresses', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('name')->null();
            $table->string('address')->null();
            $table->string('city')->null();
            $table->string('state')->null();
            $table->string('country')->null();
            $table->string('pincode')->null();
            $table->string('mobile')->null();
            $table->string('email')->null();
            $table->text('note')->null();
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
        Schema::dropIfExists('delivery_addresses');
    }
};
