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
        Schema::create('porcion_productos', function (Blueprint $table) {
            $table->id();
            $table->string('codigo')->unique();
            $table->decimal('cantidad', 5, 2)->nullable(); // Ej: 12.34 kg
            $table->string('unidad');
            $table->text('descripcion')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('porcion_productos');
    }
};
