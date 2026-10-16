@props([
    'matrices' => collect(),
])
<div class="overflow-x-auto">
    <table class="w-full">
        <thead class="bg-gray-50">
            <tr>
                <th class="p-4 text-left">Código</th>
                <th class="p-4 text-left">Matriz / Base</th>
                <th class="p-4 text-left">Familia</th>
                <th class="p-4 text-left">Descripcion</th>
                <th class="p-4 text-center">Acciones</th>
            </tr>
        </thead>

        <tbody>
            @forelse($matrices as $matrices_producto)
                <tr class="border-t">
                    <td class="p-4">
                        {{ $matrices_producto->codigo }}
                    </td>

                    <td class="p-4">
                        {{ $matrices_producto->matriz_base }}
                    </td>

                    <td class="p-4">
                        {{ $matrices_producto->familia }}
                    </td>
                    <td class="p-4">
                        {{ $matrices_producto->descripcion }}
                    </td>

                    {{-- ACCIONES --}}
                    <td class="whitespace-nowrap px-6 py-5">
                        <div class="flex items-center justify-center gap-2">
                            {{-- VER --}}
                            <x-frk.button-table-show
                                :href="route('matrices-productos.show', $matrices_producto)"
                                title="Ver ficha" />
                            {{-- EDITAR --}}
                            <x-frk.button-table-edit
                                :href="route('matrices-productos.edit', $matrices_producto)"
                                title="Editar ficha" />
                            {{-- ELIMINAR --}}
                            <x-frk.button-table-delete
                                :action="route('matrices-productos.destroy', $matrices_producto)"
                                title="Eliminar ficha"
                                message="¿Seguro que deseas eliminar permanentemente esta ficha?" />
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="p-10 text-center text-gray-500">
                        No existen registros.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
