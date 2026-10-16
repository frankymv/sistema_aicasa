
<div class="space-y-8 divide-y divide-gray-200">

    <div class="space-y-4">

        <x-frk.section-title title="Información de la Porción de Producto" />

        <div class="grid grid-cols-1 gap-y-5 gap-x-4 sm:grid-cols-6">

            <div class="sm:col-span-3">
                <x-frk.input-label-text
                    label="Código"
                    name="codigo"
                    :value="$porcion->codigo ?? ''"
                    :readonly="isset($readonly) && $readonly"
                    :required="true"
                />
            </div>
            <div class="sm:col-span-3">
                <x-frk.input-label-text
                    label="Cantidad"
                    name="cantidad"
                    :value="$porcion->cantidad ?? ''"
                    :readonly="isset($readonly) && $readonly"
                    :required="true"
                />
            </div>


            <div class="sm:col-span-3">
                <x-frk.input-label-text
                    label="Unidad"
                    name="unidad"
                    :value="$porcion->unidad ?? ''"
                    :readonly="isset($readonly) && $readonly"
                    :required="true"
                />
            </div>

            <div class="sm:col-span-6">
                <x-frk.textarea
                    label="Descripción"
                    name="descripcion"
                    :readonly="isset($readonly) && $readonly"
                >{{ old('descripcion', $porcion->descripcion ?? '') }}</x-frk.textarea>
            </div>

        </div>

    </div>

    <div class="pt-5 border-t mt-6 flex justify-end space-x-3">

        <x-frk.button-cancel
            :href="route('porcion-productos.index')"
        />

        @if(!isset($readonly) || !$readonly)
            <button
                type="submit"
                class="inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 transition">
                Guardar
            </button>
        @endif

    </div>

</div>
