<?php

use App\Models\FichaInfante;
use Livewire\Component;
use Carbon\Carbon;

new class extends Component
{
    public $infante;
    public $fecha_control_infante;
    public $pesoactualcontrol = 0;
    public $peso_ideal_control = 0;
    public $tallaactualcontrol = 0;
    public $talla_ideal_control = 0;
    public $indicador_pe_control="";

    public $edad_meses;
    public $peso_actual;
    public $peso_ideal;
    public $indicador_pe;
    public $indicador_te;
    public $indicador_pt;
    public $sexo;


    public function updatedFechacontrolInfante()
    {
        $this->pesoactualcontrol=0;

        $this->peso_ideal_control=0;
        $this->indicador_pe="";
    $this->tallaactualcontrol=0;

        $this->talla_ideal_control=0;
        $this->indicador_te="";
    }


        // Este método se ejecuta automáticamente cuando CUALQUIER propiedad cambia

    public function updatedPesoactualcontrol()
    {
        $edadActual=$this->infante->edadDetalladaControl($this->fecha_control_infante);

        //$this->peso_ideal_control=$this->calcularPesoIdeal($edadActual,$this->infante->sexo_infante);
        $this->peso_ideal_control=calcular_peso_ideal($edadActual,$this->infante->sexo_infante);
        //$this->indicador_pe=$this->calcularIndicadorPE($edadActual,$this->infante->sexo_infante,$this->pesoactualcontrol);
        $this->indicador_pe=calcular_indicador_PE($edadActual,$this->infante->sexo_infante,$this->pesoactualcontrol);
    }


public function calcularPesoIdeal($edadMeses, $sexo)
{
    // Forzamos que $edadMeses sea tratado numéricamente por seguridad
    $edadMeses = (float) $edadMeses;

    // Normalizamos el texto del sexo (quita espacios y pasa a minúsculas)
    $sexoNormalizado = trim(strtolower($sexo));

    if ($sexoNormalizado === 'masculino') {
        return
            (-0.000000007609727 * pow($edadMeses, 6)) +
            (0.000001539999866 * pow($edadMeses, 5)) -
            (0.000122171657464 * pow($edadMeses, 4)) +
            (0.004816763029197 * pow($edadMeses, 3)) -
            (0.099284220070331 * pow($edadMeses, 2)) +
            (1.21338663018105 * $edadMeses) +
            3.30113045958933;
    }

    if ($sexoNormalizado === 'femenino') {
        return
            (-0.000000006292863 * pow($edadMeses, 6)) +
            (0.000001279878154 * pow($edadMeses, 5)) -
            (0.000102250431935 * pow($edadMeses, 4)) +
            (0.004063203439273 * pow($edadMeses, 3)) -
            (0.084174576571058 * pow($edadMeses, 2)) +
            (1.06472820507588 * $edadMeses) +
            3.14128424260161;
    }

    return 0.0; // Valor de respaldo por si el sexo no es válido
}


public function calcularIndicadorPE($edadMeses, $sexo, $pesoActual)
{
    $edadMeses = (float) $edadMeses;
    $pesoActual = (float) $pesoActual;
    $sexoNormalizado = trim(strtolower($sexo));

    if (empty($sexoNormalizado) || $edadMeses < 0 || $pesoActual <= 0) {
        return '';
    }

    // ==========================================
    // SECCIÓN MUJER / FEMENINO
    // ==========================================
    if ( $sexoNormalizado === 'femenino') {

        // Corte -3SD
        $p1 = -0.0000000049242 * pow($edadMeses, 6) + 0.000001005949595 * pow($edadMeses, 5) - 0.000080433281976 * pow($edadMeses, 4) + 0.003183787106096 * pow($edadMeses, 3) - 0.065692960443971 * pow($edadMeses, 2) + 0.813609566866806 * $edadMeses + 1.94833008343858;
        if ($pesoActual <= $p1) return 'PB Severo';

        // Corte -2SD
        $p2 = -0.000000005102209 * pow($edadMeses, 6) + 0.000001041139032 * pow($edadMeses, 5) - 0.000083365079023 * pow($edadMeses, 4) + 0.003315777367021 * pow($edadMeses, 3) - 0.068975158712192 * pow($edadMeses, 2) + 0.871551899026599 * $edadMeses + 2.33145308793974;
        if ($pesoActual <= $p2) return 'PB Moderado';
        // Corte -1SD
        $p3 = -0.000000005778628 * pow($edadMeses, 6) + 0.000001178371995 * pow($edadMeses, 5) - 0.000094220204024 * pow($edadMeses, 4) + 0.003738068306944 * pow($edadMeses, 3) - 0.077232463516339 * pow($edadMeses, 2) + 0.966554339076538 * $edadMeses + 2.71945683515514;

        if ($pesoActual <= $p3) return 'Riesgo BP';

        // Límite Superior del Rango Normal (+1SD)
        $p6 = -0.000000007053396 * pow($edadMeses, 6) + 0.000001443067931 * pow($edadMeses, 5) - 0.000116465366387 * pow($edadMeses, 4) + 0.004705283855088 * pow($edadMeses, 3) - 0.099319663601818 * pow($edadMeses, 2) + 1.30318634181458 * $edadMeses + 4.1819424686837;
        if ($pesoActual <= $p6) return 'Normal';

        // Corte +2SD
        $p7 = -0.000000007412592 * pow($edadMeses, 6) + 0.000001516854272 * pow($edadMeses, 5) - 0.000122952991374 * pow($edadMeses, 4) + 0.005019910330191 * pow($edadMeses, 3) - 0.107467899594667 * pow($edadMeses, 2) + 1.45040384772437 * $edadMeses + 4.79409051461698;
        if ($pesoActual <= $p7) return 'Sobrepeso';

        return 'Obesidad';
    }

    // ==========================================
    // SECCIÓN VARÓN / MASCULINO
    // ==========================================
    else {
        // Corte -3SD
        $v1 = -0.000000005939054 * pow($edadMeses, 6) + 0.00000120523408 * pow($edadMeses, 5) - 0.000095978551498 * pow($edadMeses, 4) + 0.003808209756268 * pow($edadMeses, 3) - 0.079522364272649 * pow($edadMeses, 2) + 0.963364204189609 * $edadMeses + 2.01002639864964;
        if ($pesoActual <= $v1) return 'PB Severo';

        // Corte -2SD
        $v2 = -0.000000005991478 * pow($edadMeses, 6) + 0.000001226496099 * pow($edadMeses, 5) - 0.000098690721358 * pow($edadMeses, 4) + 0.003960597508524 * pow($edadMeses, 3) - 0.083573777374568 * pow($edadMeses, 2) + 1.03017392922629 * $edadMeses + 2.41272584275248;
        if ($pesoActual <= $v2) return 'PB Moderado';

        // Corte -1SD
        $v3 = -0.000000007152519 * pow($edadMeses, 6) + 0.000001443435762 * pow($edadMeses, 5) - 0.000114269729106 * pow($edadMeses, 4) + 0.004499402861484 * pow($edadMeses, 3) - 0.092788368255697 * pow($edadMeses, 2) + 1.12489242419724 * $edadMeses + 2.81990180667708;
        if ($pesoActual <= $v3) return 'Riesgo BP';

        // Límite Superior del Rango Normal (+1SD) -> Polinomio $v6 de tu Excel original
        $v6 = -0.000000008825549 * pow($edadMeses, 6) + 0.000001790918203 * pow($edadMeses, 5) - 0.000142323257046 * pow($edadMeses, 4) + 0.005611955675789 * pow($edadMeses, 3) - 0.115090134982438 * pow($edadMeses, 2) + 1.42471778856998 * $edadMeses + 4.38701133675931;
        if ($pesoActual <= $v6) return 'Normal';

        // Corte +2SD -> Polinomio $v7 de tu Excel original
        $v7 = -0.000000009819539 * pow($edadMeses, 6) + 0.000001984820657 * pow($edadMeses, 5) - 0.00015689104457 * pow($edadMeses, 4) + 0.006142295154604 * pow($edadMeses, 3) - 0.124593476523387 * pow($edadMeses, 2) + 1.54267600872845 * $edadMeses + 5.04048540129224;
        if ($pesoActual <= $v7) return 'Sobrepeso';

        return 'Obesidad';
    }
}

public function updatedTallaactualcontrol()
    {
        $edadActual=$this->infante->edadDetalladaControl($this->fecha_control_infante);

        //$this->talla_ideal_control=$this->calcularTallaIdeal($edadActual,$this->infante->sexo_infante);
        //$this->indicador_te=$this->calcularIndicadorTERC($edadActual,$this->infante->sexo_infante,$this->tallaactualcontrol);

        $this->talla_ideal_control=calcular_talla_ideal($edadActual,$this->infante->sexo_infante);

         $this->indicador_te=calcular_indicador_TE($edadActual,$this->tallaactualcontrol,$this->infante->sexo_infante);

         $this->indicador_pt=calcular_indicador_PT($edadActual,$this->tallaactualcontrol,$this->pesoactualcontrol,$this->infante->sexo_infante);





    }


public function calcularTallaIdeal($edadMeses, $sexo)
{
    // Forzamos el tipado numérico de los meses
    $edadMeses = (float) $edadMeses;

    // Normalizamos el texto del sexo (remueve espacios y pasa a minúsculas)
    $sexoNormalizado = trim(strtolower($sexo));

    // Si el sexo es Masculino / Hombre / Varón
    if ($sexoNormalizado === 'masculino') {
        return (float) (
            (-0.000000019182666 * pow($edadMeses, 6)) +
            (0.000003904956694 * pow($edadMeses, 5)) -
            (0.000313354106538 * pow($edadMeses, 4)) +
            (0.012670483357852 * pow($edadMeses, 3)) -
            (0.279373345938438 * pow($edadMeses, 2)) +
            (4.12799725597142 * $edadMeses) +
            50.4842534918425
        );
    }

    // Si el sexo es Femenino / Mujer
    if ($sexoNormalizado === 'femenino' || $sexoNormalizado === 'mujer') {
        return (float) (
            (-0.000000014481834 * pow($edadMeses, 6)) +
            (0.000002955982953 * pow($edadMeses, 5)) -
            (0.000239406272513 * pow($edadMeses, 4)) +
            (0.009872398441075 * pow($edadMeses, 3)) -
            (0.226375320657098 * pow($edadMeses, 2)) +
            (3.69479453534586 * $edadMeses) +
            49.804478891514
        );
    }

    return 0.0; // Valor de respaldo si el sexo no es válido o está vacío
}

public function calcularIndicadorTERC( $edadMeses, $sexo,$tallaActual)
    {
        $sexoNormalizado = trim(strtolower($sexo));
        if (empty($sexo) || $edadMeses === '' || $edadMeses === null || $tallaActual === '' || $tallaActual === null) {
            return '';
        }

        if ($sexoNormalizado === 'femenino') {
            $severo = -0.000000012813168 * pow($edadMeses, 6) + 0.000002641583674 * pow($edadMeses, 5) - 0.00021698316295 * pow($edadMeses, 4) + 0.009125567624324 * pow($edadMeses, 3) - 0.214238689683043 * pow($edadMeses, 2) + 3.44485699628422 * $edadMeses + 44.2115168580203;
            $moderado = -0.000000013192789 * pow($edadMeses, 6) + 0.000002713690453 * pow($edadMeses, 5) - 0.000222183517099 * pow($edadMeses, 4) + 0.009302634346682 * pow($edadMeses, 3) - 0.217317264050507 * pow($edadMeses, 2) + 3.52437351096887 * $edadMeses + 46.0737518161623;
            $riesgo = -0.000000013806519 * pow($edadMeses, 6) + 0.000002832902234 * pow($edadMeses, 5) - 0.000230995546627 * pow($edadMeses, 4) + 0.009608442910803 * pow($edadMeses, 3) - 0.222451054143676 * pow($edadMeses, 2) + 3.61559694077005 * $edadMeses + 47.9300741360494;
        } else {
            $severo = -0.000000016162777 * pow($edadMeses, 6) + 0.000003330850676 * pow($edadMeses, 5) - 0.000272869816737 * pow($edadMeses, 4) + 0.011411436026492 * pow($edadMeses, 3) - 0.263925700402979 * pow($edadMeses, 2) + 3.94460868710303 * $edadMeses + 44.815065813309;
            $moderado = -0.000000016956668 * pow($edadMeses, 6) + 0.00000347829389 * pow($edadMeses, 5) - 0.000283006121382 * pow($edadMeses, 4) + 0.011714848205315 * pow($edadMeses, 3) - 0.267329902066194 * pow($edadMeses, 2) + 3.99762804091733 * $edadMeses + 46.7033956806554;
            $riesgo = -0.000000018163573 * pow($edadMeses, 6) + 0.000003704569878 * pow($edadMeses, 5) - 0.000298787777773 * pow($edadMeses, 4) + 0.012203736120455 * pow($edadMeses, 3) - 0.273417231279382 * pow($edadMeses, 2) + 4.06284153377055 * $edadMeses + 48.6012971840828;
        }

        if ($tallaActual <= $severo) return 'RC. Severo';
        if ($tallaActual <= $moderado) return 'RC. Moderado';
        if ($tallaActual <= $riesgo) return 'Riesgo RC';

        return 'C. Adecuado';
    }

};
?>







<div class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm">
    <div class="sm:col-span-3">
        <x-frk.input-label-text
            label="Fecha de Control Infante"
            name="fecha_control_infante"
            type="date"
            wire:model.live="fecha_control_infante"
            :readonly="isset($readonly) && $readonly"
        />
    </div>
    <h2 class="text-lg font-bold text-gray-900">
        2. Peso
    </h2>
    <div class="mt-5 grid grid-cols-1 gap-5 md:grid-cols-3">
        <div>
            <label class="text-sm font-semibold text-gray-700">
                Peso actual (kg) *
            </label>
            <input type="number"
                    wire:model.live="pesoactualcontrol"
                    step="0.01"
                    min="0"

                    required
                    class="mt-2 w-full rounded-xl border-gray-300 focus:border-indigo-500 focus:ring-indigo-500">
        </div>
        <div>
            <label class="text-sm font-semibold text-gray-700">
                Peso ideal (kg)
            </label>
            <input type="number"
                    wire:model.live="peso_ideal_control"
                    name="peso_ideal_control"
                    step="0.01"
                    min="0"
                    value="{{ old('peso_ideal_control') }}"
                    class="mt-2 w-full rounded-xl border-gray-300 focus:border-indigo-500 focus:ring-indigo-500">
        </div>
        <div>
            <label class="text-sm font-semibold text-gray-700">
                Indicador P/E
            </label>
            <input type="text"
                    wire:model.live="indicador_pe"
                    name="peso_ideal_control"

                    value="{{ old('peso_ideal_control') }}"
                    class="mt-2 w-full rounded-xl border-gray-300 focus:border-indigo-500 focus:ring-indigo-500">
        </div>
    </div>
        {{-- TALLA --}}


        <h2 class="text-lg font-bold text-gray-900">
            3. Talla
        </h2>

        <div class="mt-5 grid grid-cols-1 gap-5 md:grid-cols-3">

            <div>

                <label class="text-sm font-semibold text-gray-700">
                    Talla actual *
                </label>

                <input type="number"
                    name="talla_actual_control"
                    wire:model.live="tallaactualcontrol"
                    step="0.01"
                    min="0"

                    required
                    class="mt-2 w-full rounded-xl border-gray-300 focus:border-indigo-500 focus:ring-indigo-500">

            </div>
            <div>

                <label class="text-sm font-semibold text-gray-700">
                    Talla ideal
                </label>

                <input type="number"
                    name="talla_ideal_control"
                    wire:model.live="talla_ideal_control"
                    step="0.01"
                    min="0"
                    value="{{ old('talla_ideal_control') }}"
                    class="mt-2 w-full rounded-xl border-gray-300 focus:border-indigo-500 focus:ring-indigo-500">
            </div>
            <div>
                <label class="text-sm font-semibold text-gray-700">
                    Indicador T/E
                </label>
                <input type="text"
                        wire:model.live="indicador_te"
                        name="peso_ideal_control"

                        value="{{ old('peso_ideal_control') }}"
                        class="mt-2 w-full rounded-xl border-gray-300 focus:border-indigo-500 focus:ring-indigo-500">
            </div>



        </div>
         <h2 class="text-lg font-bold text-gray-900">
            4. Indicador Peso / Talla
        </h2>

        <div class="mt-5 grid grid-cols-1 gap-5 md:grid-cols-3">

            <div>

                <label class="text-sm font-semibold text-gray-700">
                    Indicador P/T
                </label>

                <input type="text"
                    name="talla_actual_control"
                    wire:model.live="indicador_pt"
                    step="0.01"
                    min="0"
                    required
                    class="mt-2 w-full rounded-xl border-gray-300 focus:border-indigo-500 focus:ring-indigo-500">

            </div>
        </div>

</div>
