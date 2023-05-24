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
        Schema::create('cardapio_mesa', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mesas_id')->constrained()->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreignId('cardapio_id')->constrained()->onDelete('CASCADE')->onUpdate('CASCADE')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cardapio_mesa');
    }
};
