@props([
    'porciones' => collect(),
])

<div class="overflow-x-auto">
    <table class="w-full">

        <thead class="bg-gray-50">
            <tr>
                <th class="p-4 text-left">Código</th>
                <th class="p-4 text-left">Cantidad</th>
                <th class="p-4 text-left">Unidad</th>
                <th class="p-4 text-left">Descripción</th>
                <th class="p-4 text-center">Acciones</th>
            </tr>
        </thead>

        <tbody>

            @forelse($porciones as $porcion)

                <tr class="border-t">

                    <td class="p-4">
                        {{ $porcion->codigo }}
                    </td>
                    <td class="p-4">
                        {{ $porcion->cantidad }}
                    </td>

                    <td class="p-4">
                        {{ $porcion->unidad }}
                    </td>

                    <td class="p-4">
                        {{ Str::limit($porcion->descripcion, 80) }}
                    </td>

                    <td class="p-4 text-center">

                        <div class="flex justify-center gap-2">

                            <x-frk.button-table-show
                                :href="route('porcion-productos.show', $porcion)"
                                title="Ver registro" />

                            <x-frk.button-table-edit
                                :href="route('porcion-productos.edit', $porcion)"
                                title="Editar registro" />

                            <x-frk.button-table-delete
                                :action="route('porcion-productos.destroy', $porcion)"
                                title="Eliminar registro"
                                message="¿Desea eliminar este registro?" />

                        </div>

                    </td>

                </tr>

            @empty

                <tr>
                    <td
                        colspan="4"
                        class="p-10 text-center text-gray-500">
                        No existen registros.
                    </td>
                </tr>

            @endforelse

        </tbody>

    </table>
</div>
