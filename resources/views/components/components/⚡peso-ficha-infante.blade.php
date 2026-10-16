<?php

use App\Models\FichaInfante;
use Livewire\Component;
use Carbon\Carbon;

new class extends Component
{
    public $infante;
    public $pesoactualcontrol = 0;
    public $peso_ideal_control = 0;
    public $indicador_pe_control="";

    public $edad_meses;
    public $peso_actual;
    public $peso_ideal;
    public $indicador_pe;
    public $sexo;



        // Este método se ejecuta automáticamente cuando CUALQUIER propiedad cambia

    public function updatedPesoactualcontrol()
    {
        $this->peso_ideal_control=$this->calcularPesoIdeal($this->infante->edad_detallada->meses,$this->infante->sexo_infante);
        $this->indicador_pe=$this->calcularIndicadorPE($this->infante->edad_detallada->meses,$this->infante->sexo_infante,$this->infante->peso_infante);
    }


    public function calcularPesoIdeal($edadMeses, $sexo)
    {
        if ($sexo == 'Masculino') {
            return
                (-0.000000007609727 * pow($edadMeses, 6)) +
                (0.000001539999866 * pow($edadMeses, 5)) -
                (0.000122171657464 * pow($edadMeses, 4)) +
                (0.004816763029197 * pow($edadMeses, 3)) -
                (0.099284220070331 * pow($edadMeses, 2)) +
                (1.21338663018105 * $edadMeses) +
                3.30113045958933;
        }
        if ($sexo == 'Femenino') {
            return
                (-0.000000006292863 * pow($edadMeses, 6)) +
                (0.000001279878154 * pow($edadMeses, 5)) -
                (0.000102250431935 * pow($edadMeses, 4)) +
                (0.004063203439273 * pow($edadMeses, 3)) -
                (0.084174576571058 * pow($edadMeses, 2)) +
                (1.06472820507588 * $edadMeses) +
                3.14128424260161;
            }
        }


    public function calcularIndicadorPE( $edadMeses,$sexo, $pesoActual)
{
    if (empty($sexo) || empty($edadMeses) || empty($pesoActual)) {
        return '';
    }

    if ($sexo === 'Mujer') {

        $pbSevero = -0.0000000049242 * pow($edadMeses, 6)
            + 0.000001005949595 * pow($edadMeses, 5)
            - 0.000080433281976 * pow($edadMeses, 4)
            + 0.003183787106096 * pow($edadMeses, 3)
            - 0.065692960443971 * pow($edadMeses, 2)
            + 0.813609566866806 * $edadMeses
            + 1.94833008343858;

        $pbModerado = -0.000000005102209 * pow($edadMeses, 6)
            + 0.000001041139032 * pow($edadMeses, 5)
            - 0.000083365079023 * pow($edadMeses, 4)
            + 0.003315777367021 * pow($edadMeses, 3)
            - 0.068975158712192 * pow($edadMeses, 2)
            + 0.871551899026599 * $edadMeses
            + 2.33145308793974;

        $riesgoBP = -0.000000005778628 * pow($edadMeses, 6)
            + 0.000001178371995 * pow($edadMeses, 5)
            - 0.000094220204024 * pow($edadMeses, 4)
            + 0.003738068306944 * pow($edadMeses, 3)
            - 0.077232463516339 * pow($edadMeses, 2)
            + 0.966554339076538 * $edadMeses
            + 2.71945683515514;

        $normalMin = -0.000000006292863 * pow($edadMeses, 6)
            + 0.000001279878154 * pow($edadMeses, 5)
            - 0.000102250431935 * pow($edadMeses, 4)
            + 0.004063203439273 * pow($edadMeses, 3)
            - 0.084174576571058 * pow($edadMeses, 2)
            + 1.06472820507588 * $edadMeses
            + 3.14128424260161;

        $normalMax1 = -0.000000006528695 * pow($edadMeses, 6)
            + 0.000001334806959 * pow($edadMeses, 5)
            - 0.000107460100565 * pow($edadMeses, 4)
            + 0.004317991395993 * pow($edadMeses, 3)
            - 0.090568195505512 * pow($edadMeses, 2)
            + 1.16959668570053 * $edadMeses
            + 3.65629836057087;

        $normalMax2 = -0.000000007053396 * pow($edadMeses, 6)
            + 0.000001443067931 * pow($edadMeses, 5)
            - 0.000116465366387 * pow($edadMeses, 4)
            + 0.004705283855088 * pow($edadMeses, 3)
            - 0.099319663601818 * pow($edadMeses, 2)
            + 1.30318634181458 * $edadMeses
            + 4.1819424686837;

        $sobrepeso = -0.000000007412592 * pow($edadMeses, 6)
            + 0.000001516854272 * pow($edadMeses, 5)
            - 0.000122952991374 * pow($edadMeses, 4)
            + 0.005019910330191 * pow($edadMeses, 3)
            - 0.107467899594667 * pow($edadMeses, 2)
            + 1.45040384772437 * $edadMeses
            + 4.79409051461698;

    } else { // Hombre

        $pbSevero = -0.000000005939054 * pow($edadMeses, 6)
            + 0.00000120523408 * pow($edadMeses, 5)
            - 0.000095978551498 * pow($edadMeses, 4)
            + 0.003808209756268 * pow($edadMeses, 3)
            - 0.079522364272649 * pow($edadMeses, 2)
            + 0.963364204189609 * $edadMeses
            + 2.01002639864964;

        $pbModerado = -0.000000005991478 * pow($edadMeses, 6)
            + 0.000001226496099 * pow($edadMeses, 5)
            - 0.000098690721358 * pow($edadMeses, 4)
            + 0.003960597508524 * pow($edadMeses, 3)
            - 0.083573777374568 * pow($edadMeses, 2)
            + 1.03017392922629 * $edadMeses
            + 2.41272584275248;

        $riesgoBP = -0.000000007152519 * pow($edadMeses, 6)
            + 0.000001443435762 * pow($edadMeses, 5)
            - 0.000114269729106 * pow($edadMeses, 4)
            + 0.004499402861484 * pow($edadMeses, 3)
            - 0.092788368255697 * pow($edadMeses, 2)
            + 1.12489242419724 * $edadMeses
            + 2.81990180667708;

        $normalMin = -0.000000007609727 * pow($edadMeses, 6)
            + 0.000001539999866 * pow($edadMeses, 5)
            - 0.000122171657464 * pow($edadMeses, 4)
            + 0.004816763029197 * pow($edadMeses, 3)
            - 0.099284220070331 * pow($edadMeses, 2)
            + 1.21338663018105 * $edadMeses
            + 3.30113045958933;

        $normalMax1 = -0.000000008166532 * pow($edadMeses, 6)
            + 0.000001652651928 * pow($edadMeses, 5)
            - 0.000131087997444 * pow($edadMeses, 4)
            + 0.005165000296017 * pow($edadMeses, 3)
            - 0.106182375106073 * pow($edadMeses, 2)
            + 1.30798044777475 * $edadMeses
            + 3.83966787009194;

        $normalMax2 = -0.000000008825549 * pow($edadMeses, 6)
            + 0.000001790918203 * pow($edadMeses, 5)
            - 0.000142323257046 * pow($edadMeses, 4)
            + 0.005611955675789 * pow($edadMeses, 3)
            - 0.115090134982438 * pow($edadMeses, 2)
            + 1.42471778856998 * $edadMeses
            + 4.38701133675931;

        $sobrepeso = -0.000000009819539 * pow($edadMeses, 6)
            + 0.000001984820657 * pow($edadMeses, 5)
            - 0.00015689104457 * pow($edadMeses, 4)
            + 0.006142295154604 * pow($edadMeses, 3)
            - 0.124593476523387 * pow($edadMeses, 2)
            + 1.54267600872845 * $edadMeses
            + 5.04048540129224;
    }

    if ($pesoActual <= $pbSevero) {
        return 'PB Severo';
    }

    if ($pesoActual <= $pbModerado) {
        return 'PB Moderado';
    }

    if ($pesoActual <= $riesgoBP) {
        return 'Riesgo BP';
    }

    if ($pesoActual <= $normalMax2) {
        return 'Normal';
    }

    if ($pesoActual <= $sobrepeso) {
        return 'Sobrepeso';
    }

    return 'Obesidad';
}
};
?>
<div class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm">
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
                    value="{{ old('peso_actual_control') }}"
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
</div>
