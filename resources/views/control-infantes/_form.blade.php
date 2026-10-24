<div>
    <div class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm">

        <h2 class="text-lg font-bold text-gray-900">
            1. Información del infante
        </h2>
        <!-- Contenedor de las Tarjetas (Grid de 3x2) -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 flex-1">
            <!-- FILA UP - Card 1: Nombre -->
            <div class="flex items-center gap-3 bg-white p-4 rounded-xl border border-gray-100 shadow-sm">
                <div class="p-2 bg-blue-50 text-blue-600 rounded-lg shrink-0">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                </div>
                <div>
                    <p class="text-base font-bold text-gray-900">{{ $infante->nombre_infante }}</p>
                    <p class="text-base font-mono font-bold text-indigo-600">{{ $infante->codigo_infante }}</p>
                </div>
                <div>

                </div>
            </div>
            <!-- FILA UP - Card 3: Fecha de Nacimiento -->
            <div class="flex items-center gap-3 bg-white p-4 rounded-xl border border-gray-100 shadow-sm">
                <div class="p-2 bg-emerald-50 text-emerald-600 rounded-lg shrink-0">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                </div>
                <div>
                    <h3 class="text-xs font-semibold text-gray-500 uppercase tracking-wider">Nacimiento</h3>
                    <p class="text-base font-bold text-gray-900">{{ $infante->fecha_nacimiento_infante ?? 'No registrada' }}</p>
                    <p class="text-base font-bold text-gray-900">{{ $infante->edad_detallada_ingreso->anios }} Años, {{ $infante->edad_detallada_ingreso->meses }} Meses, {{ $infante->edad_detallada_ingreso->dias }} dias  </p>
                </div>
            </div>

            <!-- FILA DOWN - Card 5: Tutor / Responsable -->
            <div class="flex items-center gap-3 bg-white p-4 rounded-xl border border-gray-100 shadow-sm">
                <div class="p-2 bg-purple-50 text-purple-600 rounded-lg shrink-0">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                    </svg>
                </div>
                <div>
                    <h3 class="text-xs font-semibold text-gray-500 uppercase tracking-wider">Peso</h3>
                    <p class="text-base font-bold text-gray-900">{{ $infante->peso_infante ?? 'No asignado' }}</p>
                </div>
            </div>

            <!-- FILA DOWN - Card 6: Estado / Estatus -->
            <div class="flex items-center gap-3 bg-white p-4 rounded-xl border border-gray-100 shadow-sm">
                <div class="p-2 bg-rose-50 text-rose-600 rounded-lg shrink-0">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <div>
                    <h3 class="text-xs font-semibold text-gray-500 uppercase tracking-wider">Talla</h3>
                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                        {{ $infante->talla_infante ?? 'Activo' }}
                    </span>
                </div>
            </div>
            <div class="flex items-center gap-3 bg-white p-4 rounded-xl border border-gray-100 shadow-sm">
                <div class="p-2 bg-rose-50 text-rose-600 rounded-lg shrink-0">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <div>
                    <h3 class="text-xs font-semibold text-gray-500 uppercase tracking-wider">Preba Apetito</h3>
                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                        {{ $infante->prueba_apetito_infante ?? 0 }}
                    </span>
                </div>
            </div>
            <div class="flex items-center gap-3 bg-white p-4 rounded-xl border border-gray-100 shadow-sm">
                <div class="p-2 bg-rose-50 text-rose-600 rounded-lg shrink-0">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <div>
                    <h3 class="text-xs font-semibold text-gray-500 uppercase tracking-wider">Ex. Cognitivo</h3>
                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                        {{ $infante->examen_cognitivo_infante ?? 0 }}
                    </span>
                </div>
            </div>
        </div>
    </div>
    {{-- PESO --}}



    <livewire:components.peso-ficha-infante :infante="$infante" :fecha_control_infante="old('fecha_control_infante') ?? date('Y-m-d')" />




    {{-- EVOLUCIÓN --}}
    <div class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm">

        <h2 class="text-lg font-bold text-gray-900">
            5. Evolución y producto
        </h2>

        <div class="mt-5 grid grid-cols-1 gap-5 md:grid-cols-2">

            <div>

                <label class="text-sm font-semibold text-gray-700">
                    Evolución *
                </label>

                <select name="evolucion_control"
                    required
                    class="mt-2 w-full rounded-xl border-gray-300 focus:border-indigo-500 focus:ring-indigo-500">

                    <option value="">
                        Seleccione
                    </option>

                    @foreach([
                    'Mejoria',
                    'Normal',
                    'Sin mejora',
                    'Desnutricion'
                    ] as $opcion)

                    <option value="{{ $opcion }}"
                        {{ old('evolucion_control') == $opcion ? 'selected' : '' }}>

                        {{ $opcion }}

                    </option>

                    @endforeach

                </select>

            </div>


            <div>

                <label class="text-sm font-semibold text-gray-700">
                    Producto
                </label>

                  <select
                    id="matriz_producto_id"
                    name="matriz_producto_id"
                    @disabled(isset($readonly) && $readonly)
                    required
                    class="mt-1 block w-full rounded-md border-gray-300
                           shadow-sm focus:border-indigo-500
                           focus:ring-indigo-500"
                >

                    <option value="">
                        Seleccione una matriz
                    </option>


                    @foreach($productos as $producto)

                        <option
                            value="{{ $producto->id }}"
                            @selected(
                                old(
                                    'producto_id',
                                    $producto->producto_id ?? ''
                                ) == $producto->id
                            )
                        >
                            {{ $producto->codigo_producto }} -
                            {{ $producto->nombre_producto }}
                        </option>

                    @endforeach

                </select>

                @error('matriz_producto_id')
                    <p class="mt-1 text-sm text-red-600">
                        {{ $message }}
                    </p>
                @enderror

            </div>
        </div>
    </div>
    {{-- BOTONES --}}
    <div class="flex justify-end gap-3">

        <a href="{{ route('control-infantes.index') }}"
            class="rounded-xl border border-gray-300 bg-white px-5 py-3 text-sm font-semibold
                        text-gray-700 hover:bg-gray-50">
            Cancelar
        </a>


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
