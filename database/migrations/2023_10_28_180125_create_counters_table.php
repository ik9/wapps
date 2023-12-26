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
        Schema::create('counters', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('adapter_id')->nullable();
            $table->unsignedBigInteger('feeder_id')->nullable();
            $table->string('counter_number')->nullable();
            $table->string('subscribe_number')->nullable();
            $table->string('cutter_size')->nullable();
            $table->string('current_meter_reading')->nullable();
            $table->string('counter_coordinates')->nullable();
            $table->longText('counter_picture')->nullable();
            $table->string('counter_class')->nullable();
            $table->string('counter_status')->nullable();
            $table->string('property_condition')->nullable();
            $table->string('property_picture')->nullable();
            $table->string('danger_q')->nullable();
            $table->string('danger_type')->nullable();
            $table->longText('danger')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('counters');
    }
};
