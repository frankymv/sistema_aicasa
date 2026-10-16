<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PorcionProducto extends Model
{
    protected $table = 'porcion_productos';
    protected $fillable = [
        'codigo',
        'cantidad',
        'unidad',
        'descripcion',
    ];

    public function productos(): HasMany
    {
        return $this->hasMany(
            Producto::class,
            'porcion_producto_id'
        );
    }
}
