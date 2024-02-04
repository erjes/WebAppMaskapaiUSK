<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */

    public function up() : void
    {
    Schema::create('transaction', function (Blueprint $table) {
        $table->id('id_transaction');
        $table->unsignedBigInteger('id_flight');
        $table->unsignedBigInteger('id_user');
        $table->string('no_booking');
        $table->integer('total_price');
        $table->string('payment_status');
        $table->integer('seat');

        // Define foreign key relationships
        $table->foreign('id_flight')->references('id_flight')->on('flight');
        $table->foreign('id_user')->references('id')->on('users');
    });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaction');
    }
};
