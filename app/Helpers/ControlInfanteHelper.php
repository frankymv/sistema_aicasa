<?php



if (!function_exists('calcular_peso_ideal')) {
    /**
     * Traduce la fórmula de Excel para calcular el límite normal mínimo de peso (Fila 3 / Fila 4).
     * Equivale a: =SI(G3="";"";SI(I3="";"";SI(Ingreso!$J3="";"";SI(...))))
     *
     * @param mixed $edadMeses (G3)
     * @param mixed $pesoActual (I3)
     * @param string $sexo (Ingreso!$J3)
     * @return float|string Valor calculado o string vacío / "YYY" según validaciones
     */
    function calcular_peso_ideal($edadMeses, $pesoActual, string $sexo)
    {
        // SI(G3="";""; ...)
        if ($edadMeses === '' || $edadMeses === null) {
            return '';
        }

        // SI(I3="";""; ...)
        if ($pesoActual === '' || $pesoActual === null) {
            return '';
        }

        // SI(Ingreso!$J3="";""; ...)
        if (empty($sexo)) {
            return '';
        }

        // SI(Ingreso!$J3=Soporte!$AD$4; ... [Masculino / Hombre])
        if ($sexo === 'Masculino' || $sexo === 'Hombre') {
            return -0.000000007609727 * pow($edadMeses, 6)
                + 0.000001539999866 * pow($edadMeses, 5)
                - 0.000122171657464 * pow($edadMeses, 4)
                + 0.004816763029197 * pow($edadMeses, 3)
                - 0.099284220070331 * pow($edadMeses, 2)
                + 1.21338663018105 * $edadMeses
                + 3.30113045958933;
        }

        // SI(Ingreso!$J3=Soporte!$AD$5; ... [Femenino / Mujer])
        if ($sexo === 'Femenino' || $sexo === 'Mujer') {
            return -0.000000006292863 * pow($edadMeses, 6)
                + 0.000001279878154 * pow($edadMeses, 5)
                - 0.000102250431935 * pow($edadMeses, 4)
                + 0.004063203439273 * pow($edadMeses, 3)
                - 0.084174576571058 * pow($edadMeses, 2)
                + 1.06472820507588 * $edadMeses
                + 3.14128424260161;
        }

        // En caso de que no sea ni AD$4 ni AD$5 ("YYY")
        return 'YYY';
    }
}

if (!function_exists('calcular_indicador_PE')) {
    /**
     * Traduce la fórmula compleja de Excel para calcular el diagnóstico de Peso para la Edad (PE).
     * Equivale a: =SI($C3="";"";SI(G3="";"";SI(I3="";"";SI($C3="Mujer";...))))
     *
     * @param string|null $sexo ($C3)
     * @param mixed $edadMeses (G3)
     * @param mixed $pesoActual (I3)
     * @return string Diagnóstico final o string vacío si faltan datos
     */
    function calcular_indicador_PE($edadMeses, $pesoActual, string $sexo): string

    {
        // Validaciones iniciales de celdas vacías: =SI($C3="";"";SI(G3="";"";SI(I3="";"";...)))
        if (empty($sexo) || $edadMeses === '' || $edadMeses === null || $pesoActual === '' || $pesoActual === null) {
            return '';
        }

        if ($sexo === 'Mujer' || $sexo === 'Femenino') {
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

        } else { // Hombre / Masculino
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

        // Evaluación de rangos de menor a mayor peso (Lógica secuencial limpia)
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
}




if (!function_exists('calcular_talla_ideal')) {
    /**
     * Traduce la fórmula de Excel para calcular la talla ideal.
     * Equivale a: =SI(M3="";"";SI(G3="";"";SI(Ingreso!$J3="";"";SI(...))))
     *
     * @param mixed $tallaActual (M3)
     * @param mixed $edadMeses (G3)
     * @param string $sexo (Ingreso!$J3)
     * @return float|string Valor calculado o string vacío / "YYY" según validaciones
     */
    function calcular_talla_ideal($edadMeses, $tallaActual,  string $sexo)
    {
        // SI(M3="";""; ...)
        if ($tallaActual === '' || $tallaActual === null) {
            return '';
        }

        // SI(G3="";""; ...)
        if ($edadMeses === '' || $edadMeses === null) {
            return '';
        }

        // SI(Ingreso!$J3="";""; ...)
        if (empty($sexo)) {
            return '';
        }

        // SI(Ingreso!$J3=Soporte!$AD$4; ... [Masculino / Hombre])
        if ($sexo === 'Masculino' || $sexo === 'Hombre') {
            return (-0.000000019182666 * pow($edadMeses, 6))
                + (0.000003904956694 * pow($edadMeses, 5))
                - (0.000313354106538 * pow($edadMeses, 4))
                + (0.012670483357852 * pow($edadMeses, 3))
                - (0.279373345938438 * pow($edadMeses, 2))
                + (4.12799725597142 * $edadMeses)
                + 50.4842534918425;
        }

        // SI(Ingreso!$J3=Soporte!$AD$5; ... [Femenino / Mujer])
        if ($sexo === 'Femenino' || $sexo === 'Mujer') {
            return (-0.000000014481834 * pow($edadMeses, 6))
                + (0.000002955982953 * pow($edadMeses, 5))
                - (0.000239406272513 * pow($edadMeses, 4))
                + (0.009872398441075 * pow($edadMeses, 3))
                - (0.226375320657098 * pow($edadMeses, 2))
                + (3.69479453534586 * $edadMeses)
                + 49.804478891514;
        }

        // En caso de que no sea ninguna de las opciones anteriores ("YYY")
        return 'YYY';
    }
}


if (!function_exists('calcularIndicadorTERC')) {
    /**
     * COLUMNA O: Talla para la Edad <= 24 meses (TERC)
     */
    function calcularIndicadorTERC($sexo, $edadMeses, $tallaActual): string
    {
        if (empty($sexo) || $edadMeses === '' || $edadMeses === null || $tallaActual === '' || $tallaActual === null) {
            return '';
        }

        if ($sexo === 'Femenino') {
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
}

if (!function_exists('calcularIndicadorPTDC')) {
    /**
     * COLUMNA P: Talla para la Edad > 24 meses (PTDC)
     */
    function calcularIndicadorPTDC($sexo, $edadMeses, $tallaActual): string
    {
        if (empty($sexo) || $edadMeses === '' || $edadMeses === null || $tallaActual === '' || $tallaActual === null) {
            return '';
        }

        if ($sexo === 'Femenino') {
            $severo = -0.000000012813168 * pow($edadMeses, 6) + 0.000002641583674 * pow($edadMeses, 5) - 0.00021698316295 * pow($edadMeses, 4) + 0.009125567624324 * pow($edadMeses, 3) - 0.214238689683043 * pow($edadMeses, 2) + 3.44485699628422 * $edadMeses + 44.2115168580203;
            $moderado = -0.000000013192789 * pow($edadMeses, 6) + 0.000002713690453 * pow($edadMeses, 5) - 0.000222183517099 * pow($edadMeses, 4) + 0.009302634346682 * pow($edadMeses, 3) - 0.217317264050507 * pow($edadMeses, 2) + 3.52437351096887 * $edadMeses + 46.0737518161623;
            $riesgo = -0.000000013806519 * pow($edadMeses, 6) + 0.000002832902234 * pow($edadMeses, 5) - 0.000230995546627 * pow($edadMeses, 4) + 0.009608442910803 * pow($edadMeses, 3) - 0.222451054143676 * pow($edadMeses, 2) + 3.61559694077005 * $edadMeses + 47.9300741360494;
        } else {
            $severo = -0.000000016162777 * pow($edadMeses, 6) + 0.000003330850676 * pow($edadMeses, 5) - 0.000272869816737 * pow($edadMeses, 4) + 0.011411436026492 * pow($edadMeses, 3) - 0.263925700402979 * pow($edadMeses, 2) + 3.94460868710303 * $edadMeses + 44.815065813309;
            $moderado = -0.000000016956668 * pow($edadMeses, 6) + 0.00000347829389 * pow($edadMeses, 5) - 0.000283006121382 * pow($edadMeses, 4) + 0.011714848205315 * pow($edadMeses, 3) - 0.267329902066194 * pow($edadMeses, 2) + 3.99762804091733 * $edadMeses + 46.7033956806554;
            $riesgo = -0.000000018163573 * pow($edadMeses, 6) + 0.000003704569878 * pow($edadMeses, 5) - 0.000298787777773 * pow($edadMeses, 4) + 0.012203736120455 * pow($edadMeses, 3) - 0.273417231279382 * pow($edadMeses, 2) + 4.06284153377055 * $edadMeses + 48.6012971840828;
        }

        if ($tallaActual <= $severo) return 'DC. Severo';
        if ($tallaActual <= $moderado) return 'DC. Moderado';
        if ($tallaActual <= $riesgo) return 'Riesgo DC';

        return 'C. Adecuado';
    }
}

if (!function_exists('calcular_indicador_TE')) {
    /**
     * UNIFICADOR: Orquestador Talla para la Edad (TE)
     * Equivale a: =SI(C3="";"";SI(G3="";"";SI(N3="";"";SI(G3<=24;O3;P3))))
     */
    function calcular_indicador_TE($edadMeses, $tallaActual, String $sexo ): string
    {
        // Valida que ninguna de las celdas críticas esté vacía
        if (empty($sexo) || $edadMeses === '' || $edadMeses === null || $tallaActual === '' || $tallaActual === null) {
            return '';
        }

        // Si la edad es menor o igual a 24 meses, ejecuta TERC (O3). De lo contrario, ejecuta PTDC (P3)
        return $edadMeses <= 24
            ? calcularIndicadorTERC($sexo, $edadMeses, $tallaActual)
            : calcularIndicadorPTDC($sexo, $edadMeses, $tallaActual);
    }
}


if (!function_exists('calcularIndicadorDA_Menores2Anios')) {
    /**
     * Calcula Desnutrición Aguda (DA) para niños y niñas de 0 a 2 años (0 a 24 meses).
     * Equivale a las celdas FR5 (Hombres) y FT5 (Mujeres).
     */
    function calcularIndicadorDA_Menores2Anios($sexo, $tallaActual, $pesoActual)
    {
        if (empty($sexo) || $tallaActual === '' || $tallaActual === null || $pesoActual === '' || $pesoActual === null) {
            return '';
        }

        if ($sexo === 'Mujer' || $sexo === 'Femenino') {
            $severa   = 0.00000000166682 * pow($tallaActual, 6) - 0.000000804245751 * pow($tallaActual, 5) + 0.000159414116335 * pow($tallaActual, 4) - 0.016576061821854 * pow($tallaActual, 3) + 0.951569747994553 * pow($tallaActual, 2) - 28.3675208647057 * $tallaActual + 342.962548331626;
            $moderada = 0.000000001635155 * pow($tallaActual, 6) - 0.000000791631085 * pow($tallaActual, 5) + 0.000157478203938 * pow($tallaActual, 4) - 0.016432869888545 * pow($tallaActual, 3) + 0.946458092509792 * pow($tallaActual, 2) - 28.2818907847799 * $tallaActual + 342.445392327538;
            $riesgo   = 0.00000000200653 * pow($tallaActual, 6) - 0.000000969586057 * pow($tallaActual, 5) + 0.0001924420381 * pow($tallaActual, 4) - 0.020029699005793 * pow($tallaActual, 3) + 1.15034918163045 * pow($tallaActual, 2) - 34.2931272449181 * $tallaActual + 414.420846051292;
            $riesgoSP = 0.000000002462086 * pow($tallaActual, 6) - 0.000001188862503 * pow($tallaActual, 5) + 0.000235882671706 * pow($tallaActual, 4) - 0.024548767304895 * pow($tallaActual, 3) + 1.40996889579667 * pow($tallaActual, 2) - 42.0449778777953 * $tallaActual + 508.355721550674;
            $sobrep   = 0.000000002766816 * pow($tallaActual, 6) - 0.000001338929395 * pow($tallaActual, 5) + 0.000266272424758 * pow($tallaActual, 4) - 0.027775938445874 * pow($tallaActual, 3) + 1.59888314553685 * pow($tallaActual, 2) - 47.7851396592901 * $tallaActual + 579.023737476765;
        } else { // Hombre / Masculino
            $severa   = 0.000000001657047 * pow($tallaActual, 6) - 0.000000812832941 * pow($tallaActual, 5) + 0.000163730822892 * pow($tallaActual, 4) - 0.017294174573975 * pow($tallaActual, 3) + 1.00782029530844 * pow($tallaActual, 2) - 30.4675688353988 * $tallaActual + 372.935474066041;
            $moderada = 0.000000001738312 * pow($tallaActual, 6) - 0.000000853643787 * pow($tallaActual, 5) + 0.00017220481369 * pow($tallaActual, 4) - 0.018219152860049 * pow($tallaActual, 3) + 1.06347078832062 * pow($tallaActual, 2) - 32.1950581707006 * $tallaActual + 394.555827832731;
            $riesgo   = 0.000000001656341 * pow($tallaActual, 6) - 0.000000816740014 * pow($tallaActual, 5) + 0.000165610118994 * pow($tallaActual, 4) - 0.017622156743592 * pow($tallaActual, 3) + 1.03472578543966 * pow($tallaActual, 2) - 31.4858926743863 * $tallaActual + 387.547066368455;
            $riesgoSP = 0.000000001663412 * pow($tallaActual, 6) - 0.000000822861053 * pow($tallaActual, 5) + 0.000167742123972 * pow($tallaActual, 4) - 0.017968419451126 * pow($tallaActual, 3) + 1.0628104759072 * pow($tallaActual, 2) - 32.5520432896058 * $tallaActual + 402.998055399792;
            $sobrep   = 0.000000001448813 * pow($tallaActual, 6) - 0.00000072722039 * pow($tallaActual, 5) + 0.000150513439272 * pow($tallaActual, 4) - 0.01636349498384 * pow($tallaActual, 3) + 0.98129072900681 * pow($tallaActual, 2) - 30.3893635501365 * $tallaActual + 379.552106064942;
        }

        if ($pesoActual <= $severa)   return 'DA Severa';
        if ($pesoActual <= $moderada) return 'DA Moderada';
        if ($pesoActual <= $riesgo)   return 'Riesgo DA';
        if ($pesoActual <= $riesgoSP) return 'Normal';
        if ($pesoActual <= $sobrep)   return 'Riesgo SP';

        // Tu fórmula de Excel para Masculino usa una valla extra para Sobrepeso, en Femenino salta a Obesidad directamente
        if ($sexo === 'Masculino' || $sexo === 'Hombre') {
            $sobrepReal = 0.000000001473125 * pow($tallaActual, 6) - 0.000000739121945 * pow($tallaActual, 5) + 0.00015322500097 * pow($tallaActual, 4) - 0.016707345693527 * pow($tallaActual, 3) + 1.0055793544528 * pow($tallaActual, 2) - 31.2473595413204 * $tallaActual + 391.516932992594;
            if ($pesoActual <= $sobrepReal) return 'Sobrepeso';
        } else {
            $sobrepRealFem = 0.000000002908577 * pow($tallaActual, 6) - 0.000001406730204 * pow($tallaActual, 5) + 0.000279670652487 * pow($tallaActual, 4) - 0.029166404188281 * pow($tallaActual, 3) + 1.67832403651581 * pow($tallaActual, 2) - 50.1150173293384 * $tallaActual + 606.381803018623;
            if ($pesoActual <= $sobrepRealFem) return 'Sobrepeso';
        }

        return 'Obesidad';
    }
}

if (!function_exists('calcularIndicadorDA_2a5Anios')) {
    /**
     * Calcula Desnutrición Aguda (DA) para niños y niñas de 2 a 5 años (24 a 60 meses).
     * Nota: En tu Excel indicas que los dos géneros de 2 a 5 comparten la misma curva polinómica (celdas FS5 y FU5).
     */
    function calcularIndicadorDA_2a5Anios($tallaActual, $pesoActual)
    {
        if ($tallaActual === '' || $tallaActual === null || $pesoActual === '' || $pesoActual === null) {
            return '';
        }

        $severa   = -0.000000003711842 * pow($tallaActual, 6) + 0.000002053128871 * pow($tallaActual, 5) - 0.000468995718129 * pow($tallaActual, 4) + 0.056642643513105 * pow($tallaActual, 3) - 3.81423409766748 * pow($tallaActual, 2) + 135.908061104441 * $tallaActual - 1999.22711920356;
        $moderada = -0.000000003565961 * pow($tallaActual, 6) + 0.000001970116411 * pow($tallaActual, 5) - 0.000449414555393 * pow($tallaActual, 4) + 0.054196747601206 * pow($tallaActual, 3) - 3.64372426053452 * pow($tallaActual, 2) + 129.633161766733 * $tallaActual - 1903.77567225649;
        $riesgo   = -0.000000004227213 * pow($tallaActual, 6) + 0.000002336923137 * pow($tallaActual, 5) - 0.00053363747556 * pow($tallaActual, 4) + 0.064447380817949 * pow($tallaActual, 3) - 4.34125790382889 * pow($tallaActual, 2) + 154.80840756484 * $tallaActual - 2279.97561540882;
        $riesgoSP = -0.000000004722617 * pow($tallaActual, 6) + 0.000002614743449 * pow($tallaActual, 5) - 0.000597882652283 * pow($tallaActual, 4) + 0.072290325506271 * pow($tallaActual, 3) - 4.87413446843571 * pow($tallaActual, 2) + 173.917695616041 * $tallaActual - 2562.06271283098;
        $sobrep   = -0.000000005025546 * pow($tallaActual, 6) + 0.000002780817494 * pow($tallaActual, 5) - 0.000635649795083 * pow($tallaActual, 4) + 0.076859393460872 * pow($tallaActual, 3) - 5.1845126743863 * pow($tallaActual, 2) + 185.161511140884 * $tallaActual - 2731.35200776592;
        $sobrep2  = -0.000000005816389 * pow($tallaActual, 6) + 0.000003217108405 * pow($tallaActual, 5) - 0.000734995291192 * pow($tallaActual, 4) + 0.088814940171787 * pow($tallaActual, 3) - 5.98642208060878 * pow($tallaActual, 2) + 213.600040268275 * $tallaActual - 3147.48589156037;
        $sobrep3  = -0.000000005697704 * pow($tallaActual, 6) + 0.000003148701024 * pow($tallaActual, 5) - 0.000718689574072 * pow($tallaActual, 4) + 0.086767580988076 * pow($tallaActual, 3) - 5.84367525438115 * pow($tallaActual, 2) + 208.37659540965 * $tallaActual - 3068.50897144063;

        if ($pesoActual <= $severa)   return 'DA Severa';
        if ($pesoActual <= $moderada) return 'DA Moderada';
        if ($pesoActual <= $riesgo)   return 'Riesgo DA';
        if ($pesoActual <= $riesgoSP) return 'Normal';
        if ($pesoActual <= $sobrep)   return 'Normal';   // Ambas vallas en tu Excel retornan 'Normal'
        if ($pesoActual <= $sobrep2)  return 'Riesgo SP';
        if ($pesoActual <= $sobrep3)  return 'Sobrepeso';

        return 'Obesidad';
    }
}

if (!function_exists('calcular_indicador_PT')) {
    /**
     * ORQUESTADOR PRINCIPAL: Peso para la Talla / Desnutrición Aguda (DA).
     * Equivale a: =SI(Controles!M3="";"";SI(FN5<24;FV5;FW5))
     */
    function calcular_indicador_PT( $edadMeses, $tallaActual, $pesoActual, string $sexo): string
    {
        // Validación estricta de vacíos
        if (empty($sexo) || $edadMeses === '' || $edadMeses === null || $tallaActual === '' || $tallaActual === null || $pesoActual === '' || $pesoActual === null) {
            return '';
        }

        // SI(FN5<24; FV5; FW5) -> FV5 es menor a 2 años, FW5 es de 2 a 5 años
        return $edadMeses < 24
            ? calcularIndicadorDA_Menores2Anios($sexo, $tallaActual, $pesoActual)
            : calcularIndicadorDA_2a5Anios($tallaActual, $pesoActual);
    }
}







