<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('returns', function (Blueprint $table) {
            $table->id();
            $table->foreignId('rental_item_id')
                  ->unique()
                  ->constrained('rental_items')
                  ->cascadeOnDelete()
                  ->cascadeOnUpdate();
            $table->date('return_date');
            $table->unsignedInteger('late_days')->default(0);
            $table->decimal('fine_amount', 12, 2)->default(0);
            $table->text('damage_notes')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('returns');
    }
};