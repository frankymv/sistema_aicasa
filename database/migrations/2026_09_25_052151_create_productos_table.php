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
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->string('codigo_producto', 20)->unique();
            $table->string('nombre_producto');
            $table->boolean('activo')->default(true);

            // Relaciones
            $table->foreignId('matriz_producto_id')
                ->constrained('matrices_productos')
                ->cascadeOnUpdate()
                ->restrictOnDelete();

            $table->foreignId('poblacion_producto_id')
                ->constrained('poblacion_productos')
                ->cascadeOnUpdate()
                ->restrictOnDelete();

            $table->foreignId('porcion_producto_id')
                ->constrained('porcion_productos')
                ->cascadeOnUpdate()
                ->restrictOnDelete();

            $table->foreignId('tamanio_porcion_id')
                ->constrained('tamanio_porcions')
                ->cascadeOnUpdate()
                ->restrictOnDelete();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productos');
    }
};
