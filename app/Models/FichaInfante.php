<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Carbon\Carbon;

class FichaInfante extends Model
{
     use HasFactory;

    protected $table = 'ficha_infantes';

    protected $fillable = [
        'codigo_infante',
        'nombre_infante',
        'sexo_infante',
        'fecha_nacimiento_infante',
        'fecha_inscripcion_infante',
        'peso_infante',
        'talla_infante',
        'prueba_apetito_infante',
        'examen_cognitivo_infante',
        'departamento_residencia_encargado',
        'municipio_residencia_encargado',
        'direccion_residencia_encargado',
        'parentesco_encargado',
        'nombre_encargado',
        'dpi_encargado',
        'telefono_encargado',
    ];

    // Generar el código automáticamente antes de crear el registro
    protected static function booted()
    {
        static::creating(function ($infante) {
            // Ejemplo de código autogenerado: INF-2026-XXXXX
            $infante->codigo_infante = 'INF-' . date('Y') . '-' . str_pad(rand(1, 99999), 5, '0', STR_PAD_LEFT);
        });
    }


    public function controles(){
         return $this->hasMany(ControlInfante::class);
    }


    public function getEdadDetalladaActualAttribute()
    {
        if (!$this->fecha_nacimiento_infante) {
            return (object) ['anios' => 0, 'meses' => 0, 'dias' => 0];
        }

        $nacimiento = Carbon::parse($this->fecha_nacimiento_infante);
        $hoy = Carbon::now();

        // diff() devuelve un objeto DateInterval con las propiedades y, m, d
        $diferencia = $nacimiento->diff($hoy);

        return (object) [
            'anios' => $diferencia->y,
            'meses' => $diferencia->m,
            'dias'  => $diferencia->d,
        ];
    }

    public function getEdadDetalladaIngresoAttribute()
    {
        if (!$this->fecha_nacimiento_infante) {
            return (object) ['anios' => 0, 'meses' => 0, 'dias' => 0];
        }

        $nacimiento = Carbon::parse($this->fecha_nacimiento_infante);
        $inscripcion = Carbon::parse($this->fecha_inscripcion_infante);

        // diff() devuelve un objeto DateInterval con las propiedades y, m, d
        $diferencia = $nacimiento->diff($inscripcion);

        return (object) [
            'anios' => $diferencia->y,
            'meses' => $diferencia->m,
            'dias'  => $diferencia->d,
        ];
    }


    /* devuelve diferencia de la edad con la fecha de control
    public function edadDetalladaControl($fecha)
    {

        if (!$fecha) {
            return (object) [
                'anios' => 0,
                'meses' => 0,
                'dias' => 0
            ];
        }

        $diferencia = Carbon::parse($this->fecha_nacimiento_infante)->diff(Carbon::parse($fecha));

        return (object) [
            'anios' => $diferencia->y,
            'meses' => $diferencia->m,
            'dias' => $diferencia->d,
        ];
    }
        */

    public function edadDetalladaControl($fecha)
{
    if (!$fecha || !$this->fecha_nacimiento_infante) {
        return 0.0;
    }

    $nacimiento = Carbon::parse($this->fecha_nacimiento_infante);
    $control = Carbon::parse($fecha);

    if ($control->lessThan($nacimiento)) {
        return 0.0;
    }

    $diferencia = $nacimiento->diff($control);

    $totalMeses = ($diferencia->y * 12) + $diferencia->m;
    $fraccionMes = $diferencia->d / 30.44;

    // Retorna estrictamente el número decimal (float)
    return (float) round($totalMeses + $fraccionMes, 1);
}

}
