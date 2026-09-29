<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
        public function up(): void
    {
        Schema::create('rental_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('rental_id')
                  ->constrained('rentals')
                  ->cascadeOnDelete()
                  ->cascadeOnUpdate();
            $table->foreignId('vehicle_id')
                  ->constrained('vehicles')
                  ->cascadeOnDelete()
                  ->cascadeOnUpdate();
            $table->date('start_date');
            $table->date('end_date');
            $table->unsignedInteger('total_days');
            $table->decimal('subtotal', 12, 2);
            $table->enum('status', ['pending', 'active', 'returned', 'cancelled'])->default('pending');
            $table->timestamps();

            // Index komposit untuk query anti-overlap tanggal per kendaraan
            $table->index(['vehicle_id', 'start_date', 'end_date'], 'idx_vehicle_dates');
            $table->index('status');
        });
    }