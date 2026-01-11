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
        Schema::create('gados', function (Blueprint $table) {
            $table->id();

            $table->string('codigo')->unique();
            $table->integer('leite'); // litros por semana
            $table->integer('racao'); // kg por semana
            $table->integer('peso');  // kg
            $table->date('nascimento');
            $table->boolean('abatido')->default(false);

            $table->foreignId('fazenda_id')
                ->constrained('fazendas')
                ->cascadeOnDelete();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gados');
    }
};
