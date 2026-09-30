<?php 

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')
                  ->constrained('categories')
                  ->cascadeOnDelete()
                  ->cascadeOnUpdate();
            $table->string('name', 150);
            $table->string('license_plate', 20)->unique();
            $table->decimal('daily_rate', 12, 2);
            $table->enum('status', ['available', 'rented', 'maintenance'])->default('available');
            $table->string('image_url')->nullable();
            $table->timestamps();
            
            $table->index('status');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('vehicles');
    }
};
