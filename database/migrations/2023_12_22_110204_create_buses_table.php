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
        Schema::create('buses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->references('id')->on('users')
            ->cascadeOnUpdate()->restrictOnDelete();
            $table->string('bus_name');
            $table->string('bus_number');
            $table->integer('capacity');
            $table->string('type');
            $table->string('departure_location');
            $table->string('arrival_location');
            $table->dateTime('departure_time');
            $table->dateTime('arrival_time');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('buses');
    }
};
