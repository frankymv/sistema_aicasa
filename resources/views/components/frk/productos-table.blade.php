<div class="overflow-x-auto">

    <table class="min-w-full divide-y divide-gray-200">

        <thead class="bg-gray-50">

            <tr>

                <th class="px-6 py-3 text-left text-xs
                           font-semibold text-gray-600 uppercase">
                    Código
                </th>

                <th class="px-6 py-3 text-left text-xs
                           font-semibold text-gray-600 uppercase">
                    Producto
                </th>

                <th class="px-6 py-3 text-left text-xs
                           font-semibold text-gray-600 uppercase">
                    Matriz
                </th>

                <th class="px-6 py-3 text-left text-xs
                           font-semibold text-gray-600 uppercase">
                    Población
                </th>

                <th class="px-6 py-3 text-left text-xs
                           font-semibold text-gray-600 uppercase">
                    Porción
                </th>

                <th class="px-6 py-3 text-left text-xs
                           font-semibold text-gray-600 uppercase">
                    Tamaño
                </th>
                <th class="px-6 py-3 text-center text-xs
                        font-semibold text-gray-600 uppercase">
                    Estado
                </th>

                <th class="px-6 py-3 text-center text-xs
                           font-semibold text-gray-600 uppercase">
                    Acciones
                </th>

            </tr>

        </thead>

        <tbody class="divide-y divide-gray-200 bg-white">

            @forelse($productos as $producto)

                <tr class="hover:bg-gray-50 transition">

                    <td class="px-6 py-4 font-semibold text-gray-800">
                        {{ $producto->codigo_producto }}
                    </td>

                    <td class="px-6 py-4 text-gray-700">
                        {{ $producto->nombre_producto }}
                    </td>

                    <td class="px-6 py-4 text-sm text-gray-600">
                        {{ $producto->matrizProducto?->codigo }}
                        -
                        {{ $producto->matrizProducto?->matriz_base }}
                    </td>

                    <td class="px-6 py-4 text-sm text-gray-600">
                        {{ $producto->poblacionProducto?->codigo }}
                        -
                        {{ $producto->poblacionProducto?->poblacion_objetivo }}
                    </td>

                    <td class="px-6 py-4 text-sm text-gray-600">
                        {{ $producto->porcionProducto?->codigo }}
                    </td>

                    <td class="px-6 py-4 text-sm text-gray-600">
                        {{ $producto->tamanioPorcion?->codigo }}
                        -
                        {{ $producto->tamanioPorcion?->unidad }}
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-600">
                         @if($producto->activo)
                            <span class="inline-flex items-center rounded-full
                                        bg-green-100 px-3 py-1
                                        text-xs font-semibold text-green-700">
                                Activo
                            </span>
                        @else
                            <span class="inline-flex items-center rounded-full
                                        bg-red-100 px-3 py-1
                                        text-xs font-semibold text-red-700">
                                Inactivo
                            </span>
                        @endif
                    </td>


                                           {{-- ACCIONES --}}
                     <td class="whitespace-nowrap px-6 py-5">
                        <div class="flex items-center justify-center gap-2">
                            {{-- VER --}}
                            <x-frk.button-table-show
                                :href="route('productos.show', $producto)"
                                title="Ver ficha" />
                            {{-- EDITAR --}}
                            <x-frk.button-table-edit
                                :href="route('productos.edit', $producto)"
                                title="Editar ficha" />
                            {{-- ELIMINAR --}}
                            <x-frk.button-table-delete
                                :action="route('productos.destroy', $producto)"
                                title="Eliminar ficha"
                                message="¿Seguro que deseas eliminar permanentemente esta ficha?" />
                        </div>


                    </td>

                </tr>

            @empty

                <tr>

                    <td
                        colspan="7"
                        class="px-6 py-12 text-center text-gray-500"
                    >

                        No existen productos registrados.

                    </td>

                </tr>

            @endforelse

        </tbody>

    </table>

</div>
