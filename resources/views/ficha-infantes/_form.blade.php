
<div class="space-y-8 divide-y divide-gray-200">
    <!-- SECCIÓN: DATOS DEL INFANTE -->
    <div class="space-y-4">
        <x-frk.section-title title="Datos del Infante" />
        <div class="grid grid-cols-1 gap-y-5 gap-x-4 sm:grid-cols-6">
            <div class="sm:col-span-3">
                <x-frk.input-label-text
                    label="Nombre Completo"
                    name="nombre_infante"
                    :value="$fichaInfante->nombre_infante ?? ''"
                    :readonly="isset($readonly) && $readonly"
                    :required="true"
                />
            </div>

            <div class="sm:col-span-3">
                <x-frk.select
                    label="Género"
                    name="sexo_infante"
                    :readonly="isset($readonly) && $readonly"
                    :required="true"
                >
                    <option value="">Seleccione una opción</option>
                    <option value="Masculino" {{ old('sexo_infante', $fichaInfante->sexo_infante ?? '') == 'Masculino' ? 'selected' : '' }}>Masculino</option>
                    <option value="Femenino" {{ old('sexo_infante', $fichaInfante->sexo_infante ?? '') == 'Femenino' ? 'selected' : '' }}>Femenino</option>
                </x-frk.select>
            </div>

            <div class="sm:col-span-3">
                <x-frk.input-label-text
                    label="Fecha de Nacimiento"
                    name="fecha_nacimiento_infante"
                    type="date"
                    :value="$fichaInfante->fecha_nacimiento_infante ?? ''"
                    :readonly="isset($readonly) && $readonly"
                    :required="true"
                />
            </div>

            <div class="sm:col-span-3">
                <x-frk.input-label-text
                    label="Fecha de Inscripción"
                    name="fecha_inscripcion_infante"
                    type="date"
                    :value="$fichaInfante->fecha_inscripcion_infante ?? date('Y-m-d')"
                    :readonly="isset($readonly) && $readonly"
                />
            </div>
        </div>

        <!-- SECCIÓN: EXÁMENES MÉDICOS Y FÍSICOS -->
        <div class="pt-6 space-y-4">
            <x-frk.section-title title="Evaluación Física y Cognitiva" />
            <div class="grid grid-cols-1 gap-y-5 gap-x-4 sm:grid-cols-4">
                <x-frk.input-label-text
                    label="Peso (kg)"
                    name="peso_infante"
                    type="number"
                    step="0.01"
                    :value="$fichaInfante->peso_infante ?? ''"
                    :readonly="isset($readonly) && $readonly"
                />

                <x-frk.input-label-text
                    label="Talla (cm)"
                    name="talla_infante"
                    type="number"
                    step="0.01"
                    :value="$fichaInfante->talla_infante ?? ''"
                    :readonly="isset($readonly) && $readonly"
                />

                <x-frk.input-label-text
                    label="Prueba de Apetito (%)"
                    name="prueba_apetito_infante"
                    type="number"
                    step="0.01"
                    min="0"
                    max="100"
                    :value="$fichaInfante->prueba_apetito_infante ?? ''"
                    :readonly="isset($readonly) && $readonly"
                />

                <x-frk.input-label-text
                    label="Examen Cognitivo (%)"
                    name="examen_cognitivo_infante"
                    type="number"
                    step="0.01"
                    min="0"
                    max="100"
                    :value="$fichaInfante->examen_cognitivo_infante ?? ''"
                    :readonly="isset($readonly) && $readonly"
                />

            </div>
        </div>

        <!-- SECCIÓN: DATOS DEL ENCARGADO Y RESIDENCIA -->
        <div class="pt-6 space-y-4">
            <x-frk.section-title title="Información del Encargado y Ubicación" />
            <div class="grid grid-cols-1 gap-y-5 gap-x-4 sm:grid-cols-6">

                <div class="sm:col-span-3">
                    <x-frk.input-label-text
                        label="Nombre del Encargado"
                        name="nombre_encargado"
                        :value="$fichaInfante->nombre_encargado ?? ''"
                        :readonly="isset($readonly) && $readonly"
                        :required="true"
                    />
                </div>

                <div class="sm:col-span-3">
                    <x-frk.select
                        label="Parentesco"
                        name="parentesco_encargado"
                        :readonly="isset($readonly) && $readonly"
                        :required="true"
                    >
                        <option value="">Seleccione una opción</option>
                        @foreach(['madre', 'padre', 'abuelo', 'tio', 'encargado'] as $parentesco)
                            <option value="{{ $parentesco }}" {{ old('parentesco_encargado', $fichaInfante->parentesco_encargado ?? '') == $parentesco ? 'selected' : '' }}>
                                {{ ucfirst($parentesco) }}
                            </option>
                        @endforeach
                    </x-frk.select>
                </div>

                <div class="sm:col-span-3">
                    <x-frk.input-label-text
                        label="DPI (13 dígitos)"
                        name="dpi_encargado"
                        :value="$fichaInfante->dpi_encargado ?? ''"
                        :readonly="isset($readonly) && $readonly"
                        :required="true"
                    />
                </div>

                <div class="sm:col-span-3">
                    <x-frk.input-label-text
                        label="Teléfono (8 dígitos)"
                        name="telefono_encargado"
                        :value="$fichaInfante->telefono_encargado ?? ''"
                        :readonly="isset($readonly) && $readonly"
                        :required="true"
                    />
                </div>

                <div class="sm:col-span-3">

                    <label for="departamento_residencia_encargado"
                        class="block text-sm font-medium text-gray-700">
                        Departamento
                        <span class="text-red-500">*</span>
                    </label>

                    <select
                        id="departamento_residencia_encargado"
                        name="departamento_residencia_encargado"
                        @disabled(isset($readonly) && $readonly)
                        class="mt-1 block w-full rounded-md border-gray-300
                            shadow-sm focus:border-indigo-500
                            focus:ring-indigo-500 sm:text-sm p-2 border
                            disabled:bg-gray-100
                            disabled:text-gray-600
                            @error('departamento_residencia_encargado')
                                border-red-500
                            @enderror"
                    >
                        <option value="">
                            Seleccione un departamento
                        </option>
                        @foreach($departamentosMunicipios as $departamento => $municipios)
                            <option
                                value="{{ $departamento }}"
                                {{ old(
                                    'departamento_residencia_encargado',
                                    $fichaInfante->departamento_residencia_encargado ?? ''
                                ) == $departamento ? 'selected' : '' }}
                            >
                                {{ $departamento }}
                            </option>
                        @endforeach
                    </select>
                    @error('departamento_residencia_encargado')
                        <p class="mt-1 text-xs text-red-500">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
                <div class="sm:col-span-3">
                    <label for="municipio_residencia_encargado"
                        class="block text-sm font-medium text-gray-700">
                        Municipio
                        <span class="text-red-500">*</span>
                    </label>

                    <select
                        id="municipio_residencia_encargado"
                        name="municipio_residencia_encargado"
                        @disabled(isset($readonly) && $readonly)
                        class="mt-1 block w-full rounded-md border-gray-300
                            shadow-sm focus:border-indigo-500
                            focus:ring-indigo-500 sm:text-sm p-2 border
                            disabled:bg-gray-100
                            disabled:text-gray-600
                            @error('municipio_residencia_encargado')
                                border-red-500
                            @enderror"
                    >
                        <option value="">
                            Seleccione primero un departamento
                        </option>
                    </select>

                    @error('municipio_residencia_encargado')
                        <p class="mt-1 text-xs text-red-500">
                            {{ $message }}
                        </p>
                    @enderror

                </div>

                <div class="sm:col-span-6">
                    <x-frk.input-label-text
                        label="Dirección Residencial (Comunidad, Barrio o Zona)"
                        name="direccion_residencia_encargado"
                        :value="$fichaInfante->direccion_residencia_encargado ?? ''"
                        :readonly="isset($readonly) && $readonly"
                        :required="true"
                    />
                </div>
            </div>
        </div>
    </div>

    <div class="pt-5 border-t mt-6 flex justify-end space-x-3">
        <x-frk.button-cancel :href="route('ficha-infantes.index')" />
        @if(!$readonly)
        <button type="submit"
            :disabled="enviando"
            :class="!enviando ? 'inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 transition'
                : 'inline-flex justify-center rounded-md border border-transparent bg-indigo-200 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-200 transition'">
            <!-- Texto dinámico según el estado -->
            <span x-show="!enviando">Guardar</span>
            <span x-show="enviando" x-cloak>Guardando...</span>
        </button>
        @endif
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const datosGuatemala = @json($departamentosMunicipios);
        const departamentoSelect =
            document.getElementById(
                'departamento_residencia_encargado'
            );
        const municipioSelect =
            document.getElementById(
                'municipio_residencia_encargado'
            );
        // Municipio que viene de la base de datos
        const municipioSeleccionado = @json(
            old(
                'municipio_residencia_encargado',
                $fichaInfante->municipio_residencia_encargado ?? ''
            )
        );

        function cargarMunicipios(departamento, municipioSeleccionado = '') {
            // Limpiar municipios
            municipioSelect.innerHTML = '';
            // Opción inicial
            const opcionInicial = document.createElement('option');
            opcionInicial.value = '';
            opcionInicial.textContent = 'Seleccione un municipio';
            municipioSelect.appendChild(opcionInicial);
            // Si no hay departamento
            if (!departamento || !datosGuatemala[departamento]) {
                municipioSelect.disabled = true;
                return;
            }
            // Cargar municipios
        // Cargar municipios
            datosGuatemala[departamento].forEach(function (municipio) {
                const option = document.createElement('option');
                option.value = municipio;
                option.textContent = municipio;

                // Seleccionar municipio guardado
                if (municipio === municipioSeleccionado) {
                    option.selected = true;
                }
                municipioSelect.appendChild(option);
            });
            console.log("falseee")
            municipioSelect.disabled = false;
        }
        // Cambio de departamento
        departamentoSelect.addEventListener('change', function () {

            cargarMunicipios(this.value);

        });


        // Cargar automáticamente al editar
        if (departamentoSelect.value) {

            cargarMunicipios(
                departamentoSelect.value,
                municipioSeleccionado
            );
        } else {
            municipioSelect.disabled = true;
        }
    });
</script>
