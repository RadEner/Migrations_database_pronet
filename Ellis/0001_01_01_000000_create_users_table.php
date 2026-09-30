<?php 

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('email', 150)->unique();
            $table->string('password');
            $table->enum('role', ['admin', 'customer'])->default('customer');
            $table->string('phone', 20);
            $table->string('id_card_number', 30)->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

   public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
