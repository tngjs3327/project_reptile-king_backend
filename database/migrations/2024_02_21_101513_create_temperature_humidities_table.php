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
        Schema::create('temperature_humidities', function (Blueprint $table) {
            $table->id();
            $table->string('serial_code', 20);
            $table->float('temperature');
            $table->unsignedSmallInteger('humidity');
            $table->timestampTz('created_at');
            
            $table->foreign('serial_code')->references('serial_code')->on('cage_serial_codes')->cascadeOnUpdate()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('temperature_humidities');
    }
};
