<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class MatricesProducto extends Model
{
    protected $table = 'matrices_productos';

    protected $fillable = [
        'codigo',
        'matriz_base',
        'familia',
        'descripcion',
    ];

        public function productos(): HasMany
    {
        return $this->hasMany(
            Producto::class,
            'matriz_producto_id'
        );
    }

}
