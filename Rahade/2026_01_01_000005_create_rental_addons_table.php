<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
        public function up(): void
    {
        Schema::create('rental_addons', function (Blueprint $table) {
            $table->id();
            $table->foreignId('rental_item_id')
                  ->constrained('rental_items')
                  ->cascadeOnDelete()
                  ->cascadeOnUpdate();
            $table->string('addon_name', 100);
            $table->decimal('price', 12, 2);
            $table->timestamps();
        });
    }
