<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Producto extends Model
{
        protected $table = 'productos';

    protected $fillable = [
        'codigo_producto',
        'nombre_producto',
        'matriz_producto_id',
        'poblacion_producto_id',
        'porcion_producto_id',
        'tamanio_porcion_id',
        'activo'
    ];

  /**
     * Matriz del producto
     */
    public function matrizProducto(): BelongsTo
    {
        return $this->belongsTo(
            MatricesProducto::class,
            'matriz_producto_id'
        );
    }

    /**
     * Población objetivo
     */
    public function poblacionProducto(): BelongsTo
    {
        return $this->belongsTo(
            PoblacionProducto::class,
            'poblacion_producto_id'
        );
    }

    /**
     * Porción del producto
     */
    public function porcionProducto(): BelongsTo
    {
        return $this->belongsTo(
            PorcionProducto::class,
            'porcion_producto_id'
        );
    }

    /**
     * Tamaño de la porción
     */
    public function tamanioPorcion(): BelongsTo
    {
        return $this->belongsTo(
            TamanioPorcion::class,
            'tamanio_porcion_id'
        );
    }
    public function controles(): HasMany
    {
        return $this->hasMany(
        ControlInfante::class,
        'producto_id'
    );
    }
}
