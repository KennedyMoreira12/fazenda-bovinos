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
        Schema::create('fazenda_veterinario', function (Blueprint $table) {
            $table->id();

            $table->foreignId('fazenda_id')
                ->constrained('fazendas')
                ->cascadeOnDelete();

            $table->foreignId('veterinario_id')
                ->constrained('veterinarios')
                ->cascadeOnDelete();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fazenda_veterinario');
    }
};
