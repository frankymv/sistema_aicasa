<?php

namespace App\Livewire;

use Livewire\Component;

class SelectDepartamentos extends Component
{
    // Propiedades para los selects
    public $departamento_residencia_encargado;
    public $municipio_residencia_encargado;

    // Listados de datos
    public $departamentosMunicipios = [];
    public $municipios = [];

    // Control de solo lectura
    public $readonly = false;

    public function mount($departamentosMunicipios, $fichaInfante = null, $readonly = false)
    {
        $this->departamentosMunicipios = $departamentosMunicipios;
        $this->readonly = $readonly;

        // Cargar valores iniciales desde la base de datos o el estado anterior (old)
        $this->departamento_residencia_encargado = old(
            'departamento_residencia_encargado',
            $fichaInfante->departamento_residencia_encargado ?? ''
        );

        $this->municipio_residencia_encargado = old(
            'municipio_residencia_encargado',
            $fichaInfante->municipio_residencia_encargado ?? ''
        );

        // Si ya hay un departamento seleccionado al cargar, llenar los municipios
        if ($this->departamento_residencia_encargado) {
            $this->municipios = $this->departamentosMunicipios[$this->departamento_residencia_encargado] ?? [];
        }
    }

    // Este método se ejecuta automáticamente cuando cambia el departamento
    public function updatedDepartamentoResidenciaEncargado($value)
    {
        // Actualizar la lista de municipios según el departamento seleccionado
        $this->municipios = $this->departamentosMunicipios[$value] ?? [];

        // Resetear el municipio seleccionado
        $this->municipio_residencia_encargado = '';
    }

    public function render()
    {
        return view('livewire.select-departamentos');
    }
}
