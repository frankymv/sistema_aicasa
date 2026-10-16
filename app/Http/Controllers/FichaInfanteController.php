<?php

namespace App\Http\Controllers;

use App\Models\FichaInfante;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests\StoreFichaInfanteRequest;
use App\Models\ControlInfante;

class FichaInfanteController extends Controller
{

     private function departamentosMunicipios()
    {
        return [
            'Alta Verapaz' => [
                'Cobán',
                'Santa Cruz Verapaz',
                'San Cristóbal Verapaz',
                'Tactic',
                'Tamahú',
                'Tucurú',
                'Panzós',
                'Senahú',
                'San Pedro Carchá',
                'San Juan Chamelco',
                'Lanquín',
                'Cahabón',
                'Chisec',
                'Chahal',
                'Fray Bartolomé de las Casas',
                'Raxruhá',
            ],

            'Baja Verapaz' => [
                'Salamá',
                'San Miguel Chicaj',
                'Rabinal',
                'Cubulco',
                'Granados',
                'El Chol',
                'San Jerónimo',
                'Purulhá',
            ],

            'Chimaltenango' => [
                'Chimaltenango',
                'San José Poaquil',
                'San Martín Jilotepeque',
                'Comalapa',
                'Santa Apolonia',
                'Tecpán Guatemala',
                'Patzún',
                'Pochuta',
                'Patzicía',
                'Santa Cruz Balanyá',
                'Acatenango',
                'San Pedro Yepocapa',
                'San Andrés Itzapa',
                'Parramos',
                'Zaragoza',
                'El Tejar',
            ],

            'Chiquimula' => [
                'Chiquimula',
                'San José La Arada',
                'San Juan Ermita',
                'Jocotán',
                'Camotán',
                'Olopa',
                'Esquipulas',
                'Concepción Las Minas',
                'Quezaltepeque',
                'San Jacinto',
                'Ipala',
            ],

            'El Progreso' => [
                'Guastatoya',
                'Morazán',
                'San Agustín Acasaguastlán',
                'San Cristóbal Acasaguastlán',
                'El Jícaro',
                'Sansare',
                'Sanarate',
                'San Antonio La Paz',
            ],

            'Escuintla' => [
                'Escuintla',
                'Santa Lucía Cotzumalguapa',
                'La Democracia',
                'Siquinalá',
                'Masagua',
                'Tiquisate',
                'La Gomera',
                'Guanagazapa',
                'Puerto San José',
                'Iztapa',
                'Palín',
                'San Vicente Pacaya',
                'Nueva Concepción',
                'Sipacate',
            ],

            'Guatemala' => [
                'Guatemala',
                'Santa Catarina Pinula',
                'San José Pinula',
                'San José del Golfo',
                'Palencia',
                'Chinautla',
                'San Pedro Ayampuc',
                'Mixco',
                'San Pedro Sacatepéquez',
                'San Juan Sacatepéquez',
                'San Raymundo',
                'Chuarrancho',
                'Fraijanes',
                'Amatitlán',
                'Villa Nueva',
                'Villa Canales',
                'San Miguel Petapa',
            ],

            'Huehuetenango' => [
                'Huehuetenango',
                'Chiantla',
                'Malacatancito',
                'Cuilco',
                'Nentón',
                'San Pedro Necta',
                'Jacaltenango',
                'Soloma',
                'San Ildefonso Ixtahuacán',
                'Santa Bárbara',
                'La Libertad',
                'La Democracia',
                'San Miguel Acatán',
                'San Rafael La Independencia',
                'Todos Santos Cuchumatán',
                'San Juan Atitán',
                'Santa Eulalia',
                'San Mateo Ixtatán',
                'Colotenango',
                'San Sebastián Coatán',
                'San Rafael Petzal',
                'San Gaspar Ixchil',
                'Santiago Chimaltenango',
                'Santa Ana Huista',
                'Concepción Huista',
                'San Antonio Huista',
                'Unión Cantinil',
                'Petatán',
            ],

            'Izabal' => [
                'Puerto Barrios',
                'Livingston',
                'El Estor',
                'Morales',
                'Los Amates',
            ],

            'Jalapa' => [
                'Jalapa',
                'San Pedro Pinula',
                'San Luis Jilotepeque',
                'San Manuel Chaparrón',
                'San Carlos Alzatate',
                'Monjas',
                'Mataquescuintla',
            ],

            'Jutiapa' => [
                'Jutiapa',
                'El Progreso',
                'Santa Catarina Mita',
                'Agua Blanca',
                'Asunción Mita',
                'Yupiltepeque',
                'Atescatempa',
                'Jerez',
                'El Adelanto',
                'Zapotitlán',
                'Comapa',
                'Jalpatagua',
                'Conguaco',
                'Moyuta',
                'Pasaco',
                'Quesada',
            ],

            'Petén' => [
                'Flores',
                'San José',
                'San Benito',
                'San Andrés',
                'La Libertad',
                'San Francisco',
                'Santa Ana',
                'Dolores',
                'San Luis',
                'Sayaxché',
                'Melchor de Mencos',
                'Poptún',
                'Las Cruces',
                'El Chal',
            ],

            'Quetzaltenango' => [
                'Quetzaltenango',
                'Salcajá',
                'Olintepeque',
                'San Carlos Sija',
                'Sibilia',
                'Cabricán',
                'Cajolá',
                'San Miguel Sigüilá',
                'San Juan Ostuncalco',
                'San Mateo',
                'Concepción Chiquirichapa',
                'Almolonga',
                'Cantel',
                'Huitán',
                'Zunil',
                'Colomba',
                'San Francisco La Unión',
                'El Palmar',
                'Coatepeque',
                'Génova',
                'Flores Costa Cuca',
                'La Esperanza',
                'Palestina de Los Altos',
            ],

            'Quiché' => [
                'Santa Cruz del Quiché',
                'Chiché',
                'Chinique',
                'Zacualpa',
                'Chajul',
                'Chichicastenango',
                'Patzité',
                'San Antonio Ilotenango',
                'San Pedro Jocopilas',
                'Cunén',
                'San Juan Cotzal',
                'Joyabaj',
                'Nebaj',
                'San Andrés Sajcabajá',
                'Uspantán',
                'Sacapulas',
                'San Bartolomé Jocotenango',
                'Canillá',
                'Chicamán',
                'Ixcán',
                'Pachalum',
            ],

            'Retalhuleu' => [
                'Retalhuleu',
                'San Sebastián',
                'Santa Cruz Muluá',
                'San Martín Zapotitlán',
                'San Felipe',
                'San Andrés Villa Seca',
                'Champerico',
                'Nuevo San Carlos',
                'El Asintal',
            ],

            'Sacatepéquez' => [
                'Antigua Guatemala',
                'Jocotenango',
                'Pastores',
                'Sumpango',
                'Santo Domingo Xenacoj',
                'Santiago Sacatepéquez',
                'San Bartolomé Milpas Altas',
                'San Lucas Sacatepéquez',
                'Santa Lucía Milpas Altas',
                'Magdalena Milpas Altas',
                'Santa María de Jesús',
                'Ciudad Vieja',
                'San Miguel Dueñas',
                'Alotenango',
                'San Antonio Aguas Calientes',
                'Santa Catarina Barahona',
            ],

            'San Marcos' => [
                'San Marcos',
                'San Pedro Sacatepéquez',
                'San Antonio Sacatepéquez',
                'Comitancillo',
                'San Miguel Ixtahuacán',
                'Concepción Tutuapa',
                'Tacaná',
                'Sibinal',
                'Tajumulco',
                'Tejutla',
                'San Rafael Pie de la Cuesta',
                'Nuevo Progreso',
                'El Tumbador',
                'El Rodeo',
                'Malacatán',
                'Catarina',
                'Ayutla',
                'Ocós',
                'San Pablo',
                'El Quetzal',
                'La Reforma',
                'Pajapita',
                'Ixchiguán',
                'San José Ojetenam',
                'Río Blanco',
                'San Lorenzo',
            ],

            'Santa Rosa' => [
                'Cuilapa',
                'Barberena',
                'Santa Rosa de Lima',
                'Casillas',
                'San Rafael Las Flores',
                'Oratorio',
                'San Juan Tecuaco',
                'Chiquimulilla',
                'Taxisco',
                'Santa María Ixhuatán',
                'Guazacapán',
                'Santa Cruz Naranjo',
                'Pueblo Nuevo Viñas',
                'Nueva Santa Rosa',
            ],

            'Sololá' => [
                'Sololá',
                'San José Chacayá',
                'Santa María Visitación',
                'Santa Lucía Utatlán',
                'Nahualá',
                'Santa Catarina Ixtahuacán',
                'Santa Clara La Laguna',
                'Concepción',
                'San Andrés Semetabaj',
                'Panajachel',
                'Santa Catarina Palopó',
                'San Antonio Palopó',
                'San Lucas Tolimán',
                'Santa Cruz La Laguna',
                'San Pablo La Laguna',
                'San Marcos La Laguna',
                'San Juan La Laguna',
                'San Pedro La Laguna',
                'Santiago Atitlán',
            ],

            'Suchitepéquez' => [
                'Mazatenango',
                'Cuyotenango',
                'San Francisco Zapotitlán',
                'San Bernardino',
                'San José El Ídolo',
                'Santo Domingo Suchitepéquez',
                'San Lorenzo',
                'Samayac',
                'San Pablo Jocopilas',
                'San Antonio Suchitepéquez',
                'San Miguel Panán',
                'San Gabriel',
                'Chicacao',
                'Patulul',
                'Santa Bárbara',
                'San Juan Bautista',
                'Santo Tomás La Unión',
                'Zunilito',
                'Pueblo Nuevo',
                'Río Bravo',
            ],

            'Totonicapán' => [
                'Totonicapán',
                'San Cristóbal Totonicapán',
                'San Francisco El Alto',
                'San Andrés Xecul',
                'Momostenango',
                'Santa María Chiquimula',
                'Santa Lucía La Reforma',
                'San Bartolo',
            ],

            'Zacapa' => [
                'Zacapa',
                'Estanzuela',
                'Río Hondo',
                'Gualán',
                'Teculután',
                'Usumatlán',
                'Cabañas',
                'San Diego',
                'La Unión',
                'Huité',
                'San Jorge',
            ],
        ];
    }
    /**
     * Display a listing of the resource.
     */
    // 1. LISTAR: Mostrar todos los infantes registrados
    public function index()
    {

        $infantes = FichaInfante::latest()->paginate(10);
        return view('ficha-infantes.index',[
                'infantes' => $infantes
            ]);
    }

    public function create()
    {
        $departamentosMunicipios = $this->departamentosMunicipios();
        return view('ficha-infantes.create', compact('departamentosMunicipios'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFichaInfanteRequest $request)
    {
        $request->validated();
        $userId = Auth::id() ?? $request->ip();
        // Crea un bloqueo de 10 segundos para este usuario y esta acción
        $lock = Cache::lock('guardar-datos-' . $userId, 5);
        if ($lock->get()) {

        // El código_infante se genera solo en el modelo gracias al evento booted()
        $data=FichaInfante::create($request->validated());

        //dd(calcular_peso_ideal(11.28,8,"Femenino")); 8.8382614820172
        //dd(calcular_indicador_PE(11.28,8,"Femenino")); normal
        //dd(calcular_talla_ideal(11.28,68,"Femenino")); 73.481571219066
        //dd(calcular_indicador_TE(11.28,68,"Femenino")); RC. Moderado
        //dd(calcular_indicador_PT(11.28,68,8,"Femenino")); normal PT


        ControlInfante::create([
        'ficha_infante_id' => $data->id,
        'numero_control' => 1,
        'anios_edad_control' => $data->edad_detallada_ingreso->anios,
        'meses_edad_control' => $data->edad_detallada_ingreso->meses,
        'dia_edad_control' => $data->edad_detallada_ingreso->dias,
        'peso_actual_control' => $data->peso_infante,
        'peso_ideal_control' => calcular_peso_ideal($data->edad_detallada_ingreso->meses, $data->peso_infante,$data->sexo_infante),
        'indicador_pe_control' => calcular_indicador_PE($data->edad_detallada_ingreso->meses, $data->peso_infante,$data->sexo_infante),
        'talla_actual_control' => $data->talla_infante,
        'talla_ideal_control' => calcular_talla_ideal($data->edad_detallada_ingreso->meses,$data->talla_infante,$data->sexo_infante),
        'indicador_te_control' => calcular_indicador_TE($data->edad_detallada_ingreso->meses,$data->talla_infante,$data->sexo_infante),
        'indicador_pt_control' => calcular_indicador_PT($data->edad_detallada_ingreso->meses,$data->talla_infante, $data->peso_infante,$data->sexo_infante),
        'evolucion_control' => "Sin Registro",
        'producto_control' => null,
        'prueba_apetito_infante'=>$data->prueba_apetito_infante,
        'examen_cognitivo_infante'=>$data->examen_cognitivo_infante
        ]);


        return redirect()->route('ficha-infantes.index')
            ->with('success', 'Ficha del infante creada exitosamente.');
    }
        // Si el bloqueo ya existía, rechazamos la petición
        return redirect()->back()->with('error', 'Ya estamos procesando tu solicitud. Por favor espera.');

    }
    /**
     * Display the specified resource.
     */
    public function show(StoreFichaInfanteRequest $fichaInfante)
    {
        $departamentosMunicipios = $this->departamentosMunicipios();
        return view('ficha-infantes.show', compact('fichaInfante','departamentosMunicipios'));
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FichaInfante $fichaInfante)
    {
        $departamentosMunicipios = $this->departamentosMunicipios();
        $municipioSeleccionado = $departamentosMunicipios[$fichaInfante->departamento_residencia_encargado] ?? [];
        return view('ficha-infantes.edit', compact('fichaInfante','departamentosMunicipios','municipioSeleccionado'));
    }
    // 6. ACTUALIZAR: Guardar los cambios editados
    public function update(StoreFichaInfanteRequest $request, FichaInfante $fichaInfante)
    {
        $fichaInfante->update($request->validated());

        ControlInfante::updateOrCreate(
            ['ficha_infante_id' => $fichaInfante->id,'numero_control'=>1],
            [
            'ficha_infante_id',
            'numero_control',
            'anios_edad_control',
            'meses_edad_control',
            'dia_edad_control',
            'peso_actual_control',
            'peso_ideal_control',
            'indicador_pe_control',
            'talla_actual_control',
            'talla_ideal_control',
            'indicador_te_control',
            'indicador_pt_control',
            'evolucion_control',
            'producto_control',
            'prueba_apetito_infante',
            'examen_cognitivo_infante',
            'producto_id'
            ]);

        return redirect()->route('ficha-infantes.index')
            ->with('success', 'Ficha del infante actualizada correctamente.');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FichaInfante $fichaInfante)
    {
        $fichaInfante->delete();
        return redirect()->route('ficha-infantes.index')
            ->with('success', 'Ficha eliminada correctamente.');
    }

    function calcularValor($edadMeses, $pesoActual, $valorIngreso, $ad4, $ad5)
    {
        if (
            $edadMeses === null || $edadMeses === '' ||
            $pesoActual === null || $pesoActual === '' ||
            $valorIngreso === null || $valorIngreso === ''
        ) {
            return '';
        }

        if ($valorIngreso == $ad4) {

            return
                -0.000000007609727 * pow($edadMeses, 6) +
                0.000001539999866 * pow($edadMeses, 5) -
                0.000122171657464 * pow($edadMeses, 4) +
                0.004816763029197 * pow($edadMeses, 3) -
                0.099284220070331 * pow($edadMeses, 2) +
                1.21338663018105  * $edadMeses +
                3.30113045958933;
        }

        if ($valorIngreso == $ad5) {

            return
                -0.000000006292863 * pow($edadMeses, 6) +
                0.000001279878154 * pow($edadMeses, 5) -
                0.000102250431935 * pow($edadMeses, 4) +
                0.004063203439273 * pow($edadMeses, 3) -
                0.084174576571058 * pow($edadMeses, 2) +
                1.06472820507588  * $edadMeses +
                3.14128424260161;
        }

        return 'YYY';
    }


}
