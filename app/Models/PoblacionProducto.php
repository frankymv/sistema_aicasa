<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PoblacionProducto extends Model
{
    protected $table = 'poblacion_productos';
    protected $fillable = [
    'codigo',
    'poblacion_objetivo',
    'descripcion',
    ];

        public function productos(): HasMany
    {
        return $this->hasMany(
            Producto::class,
            'poblacion_producto_id'
        );
    }
}
