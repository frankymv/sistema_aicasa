<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TamanioPorcion extends Model
{
    protected $table = 'tamanio_porcions';
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
            'tamanio_porcion_id'
        );
    }
}
