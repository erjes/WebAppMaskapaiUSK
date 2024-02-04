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
    Schema::create('customer', function (Blueprint $table) {
        $table->id('id_customer');
        $table->string('name');
        $table->string('email');
        $table->string('phone_number');
        $table->string('address');
        $table->unsignedBigInteger('id_user')->nullable();
        $table->string('customer_status')->nullable();

        // Define foreign key relationship
        $table->foreign('id_user')->references('id')->on('users')->onDelete('set null');
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customer');
    }
};
