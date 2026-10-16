<div class="space-y-8 divide-y divide-gray-200">
    <div class="space-y-4">
        <x-frk.section-title title="Información de la Matriz de Producto" />
        <div class="grid grid-cols-1 gap-y-5 gap-x-4 sm:grid-cols-6">
            <div class="sm:col-span-2">
                <x-frk.input-label-text
                    label="Código"
                    name="codigo"
                    :value="$matricesProducto->codigo ?? ''"
                    :readonly="isset($readonly) && $readonly"
                    :required="true"
                />
            </div>
            <div class="sm:col-span-2">
                <x-frk.input-label-text
                    label="Matriz Base"
                    name="matriz_base"
                    :value="$matricesProducto->matriz_base ?? ''"
                    :readonly="isset($readonly) && $readonly"
                    :required="true"
                />
            </div>
            <div class="sm:col-span-2">
                <x-frk.input-label-text
                    label="Familia"
                    name="familia"
                    :value="$matricesProducto->familia ?? ''"
                    :readonly="isset($readonly) && $readonly"
                    :required="true"
                />
            </div>
            <div class="sm:col-span-6">
                <x-frk.textarea
                    label="Descripción"
                    name="descripcion"
                    :value="$matricesProducto->descripcion ?? ''"
                    :readonly="isset($readonly) && $readonly"

                />
            </div>
        </div>
    </div>

    <div class="pt-5 border-t mt-6 flex justify-end space-x-3">
        <x-frk.button-cancel :href="route('matrices-productos.index')" />
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
