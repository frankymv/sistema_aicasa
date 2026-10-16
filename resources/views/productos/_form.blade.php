<div class="space-y-8 divide-y divide-gray-200">

    {{-- INFORMACIÓN GENERAL --}}
    <div class="space-y-4">

        <x-frk.section-title
            title="Información del Producto"
        />

        <div class="grid grid-cols-1 gap-y-5 gap-x-4 sm:grid-cols-6">

            {{-- CÓDIGO --}}
            <div class="sm:col-span-2">

                <x-frk.input-label-text
                    label="Código del Producto"
                    name="codigo_producto"
                    :value="$producto->codigo_producto ?? ''"
                    :readonly="isset($readonly) && $readonly"
                    :required="true"
                />

            </div>

            {{-- NOMBRE --}}
            <div class="sm:col-span-4">

                <x-frk.input-label-text
                    label="Nombre del Producto"
                    name="nombre_producto"
                    :value="$producto->nombre_producto ?? ''"
                    :readonly="isset($readonly) && $readonly"
                    :required="true"
                />

            </div>

            {{-- MATRIZ --}}
            <div class="sm:col-span-3">

                <label
                    for="matriz_producto_id"
                    class="block text-sm font-medium text-gray-700"
                >
                    Matriz de Producto
                    <span class="text-red-500">*</span>
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

                    @foreach($matrices as $matriz)

                        <option
                            value="{{ $matriz->id }}"
                            @selected(
                                old(
                                    'matriz_producto_id',
                                    $producto->matriz_producto_id ?? ''
                                ) == $matriz->id
                            )
                        >
                            {{ $matriz->codigo }} -
                            {{ $matriz->matriz_base }}
                        </option>

                    @endforeach

                </select>

                @error('matriz_producto_id')
                    <p class="mt-1 text-sm text-red-600">
                        {{ $message }}
                    </p>
                @enderror

            </div>

            {{-- POBLACIÓN --}}
            <div class="sm:col-span-3">

                <label
                    for="poblacion_producto_id"
                    class="block text-sm font-medium text-gray-700"
                >
                    Población Objetivo
                    <span class="text-red-500">*</span>
                </label>

                <select
                    id="poblacion_producto_id"
                    name="poblacion_producto_id"
                    @disabled(isset($readonly) && $readonly)
                    required
                    class="mt-1 block w-full rounded-md border-gray-300
                           shadow-sm focus:border-indigo-500
                           focus:ring-indigo-500"
                >

                    <option value="">
                        Seleccione una población
                    </option>

                    @foreach($poblaciones as $poblacion)

                        <option
                            value="{{ $poblacion->id }}"
                            @selected(
                                old(
                                    'poblacion_producto_id',
                                    $producto->poblacion_producto_id ?? ''
                                ) == $poblacion->id
                            )
                        >
                            {{ $poblacion->codigo }} -
                            {{ $poblacion->poblacion_objetivo }}
                        </option>

                    @endforeach

                </select>

                @error('poblacion_producto_id')
                    <p class="mt-1 text-sm text-red-600">
                        {{ $message }}
                    </p>
                @enderror

            </div>

            {{-- PORCIÓN --}}
            <div class="sm:col-span-3">

                <label
                    for="porcion_producto_id"
                    class="block text-sm font-medium text-gray-700"
                >
                    Porción
                    <span class="text-red-500">*</span>
                </label>

                <select
                    id="porcion_producto_id"
                    name="porcion_producto_id"
                    @disabled(isset($readonly) && $readonly)
                    required
                    class="mt-1 block w-full rounded-md border-gray-300
                           shadow-sm focus:border-indigo-500
                           focus:ring-indigo-500"
                >

                    <option value="">
                        Seleccione una porción
                    </option>

                    @foreach($porciones as $porcion)

                        <option
                            value="{{ $porcion->id }}"
                            @selected(
                                old(
                                    'porcion_producto_id',
                                    $producto->porcion_producto_id ?? ''
                                ) == $porcion->id
                            )
                        >
                            {{ $porcion->codigo }} -
                            {{ $porcion->cantidad }} -
                            {{ $porcion->unidad }}
                        </option>

                    @endforeach

                </select>

                @error('porcion_producto_id')
                    <p class="mt-1 text-sm text-red-600">
                        {{ $message }}
                    </p>
                @enderror

            </div>

            {{-- TAMAÑO --}}
            <div class="sm:col-span-3">

                <label
                    for="tamanio_porcion_id"
                    class="block text-sm font-medium text-gray-700"
                >
                    Tamaño de Porción
                    <span class="text-red-500">*</span>
                </label>

                <select
                    id="tamanio_porcion_id"
                    name="tamanio_porcion_id"
                    @disabled(isset($readonly) && $readonly)
                    required
                    class="mt-1 block w-full rounded-md border-gray-300
                           shadow-sm focus:border-indigo-500
                           focus:ring-indigo-500"
                >

                    <option value="">
                        Seleccione un tamaño
                    </option>

                    @foreach($tamanios as $tamanio)

                        <option
                            value="{{ $tamanio->id }}"
                            @selected(
                                old(
                                    'tamanio_porcion_id',
                                    $producto->tamanio_porcion_id ?? ''
                                ) == $tamanio->id
                            )
                        >
                            {{ $tamanio->codigo }} -
                            {{ $tamanio->unidad }}
                        </option>

                    @endforeach

                </select>

                @error('tamanio_porcion_id')
                    <p class="mt-1 text-sm text-red-600">
                        {{ $message }}
                    </p>
                @enderror

            </div>
            <div class="sm:col-span-3">

            <x-frk.checkbox-activo
            :readonly="isset($readonly) && $readonly"
            :value="$producto->activo ?? true"
            />
            </div>

        </div>

    </div>

    {{-- BOTONES --}}
    <div class="pt-5 border-t mt-6 flex justify-end space-x-3">

        <x-frk.button-cancel
            :href="route('productos.index')"
        />

        @if(!$readonly)

            <button
                type="submit"
                :disabled="enviando"
                :class="!enviando
                    ? 'inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 transition'
                    : 'inline-flex justify-center rounded-md border border-transparent bg-indigo-200 py-2 px-4 text-sm font-medium text-white shadow-sm'"
            >

                <span x-show="!enviando">
                    Guardar
                </span>

                <span x-show="enviando" x-cloak>
                    Guardando...
                </span>

            </button>

        @endif

    </div>

</div>
