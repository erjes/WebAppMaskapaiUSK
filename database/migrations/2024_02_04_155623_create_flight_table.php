<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
    Schema::create('flight', function (Blueprint $table) {
        $table->id('id_flight');
        $table->unsignedBigInteger('id_airline');
        $table->string('no_flight');
        $table->string('departure_city');
        $table->string('arrival_city');
        $table->date('departure_date');
        $table->time('departure_time');
        $table->date('arrival_date');
        $table->time('arrival_time');
        $table->integer('seat_availability');
        $table->integer('price');
        $table->unsignedBigInteger('id_user');

        // Define foreign key relationships
        $table->foreign('id_airline')->references('id_airline')->on('airline');
        $table->foreign('id_user')->references('id')->on('users');
    });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('flight');
    }
};
