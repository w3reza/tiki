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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->references('id')->on('users')
            ->cascadeOnUpdate()->restrictOnDelete();
            $table->foreignId('bus_id')->references('id')->on('buses')
            ->cascadeOnUpdate()->restrictOnDelete();
            $table->foreignId('seat_id')->references('id')->on('seats')
            ->cascadeOnUpdate()->restrictOnDelete();
            $table->dateTime('booking_date');
            $table->enum('status', ['Confirmed', 'Pending', 'Canceled']);
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
