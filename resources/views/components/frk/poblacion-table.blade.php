<div class="overflow-x-auto">

    <table class="min-w-full divide-y divide-gray-200">

        <thead class="bg-gray-50">

            <tr>

                <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                    Código
                </th>

                <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                    Población Objetivo
                </th>

                <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                    Descripción
                </th>

                <th class="px-6 py-3 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
                    Acciones
                </th>

            </tr>

        </thead>

        <tbody class="divide-y divide-gray-200 bg-white">

            @forelse($poblacionesProductos as $poblacionesProducto)

                <tr class="hover:bg-gray-50 transition">

                    {{-- CÓDIGO --}}
                    <td class="px-6 py-4 whitespace-nowrap">

                        <span class="font-semibold text-gray-800">
                            {{ $poblacionesProducto->codigo }}
                        </span>

                    </td>

                    {{-- POBLACIÓN --}}
                    <td class="px-6 py-4">

                        <span class="text-gray-700">
                            {{ $poblacionesProducto->poblacion_objetivo }}
                        </span>

                    </td>

                    {{-- DESCRIPCIÓN --}}
                    <td class="px-6 py-4">

                        <span class="text-sm text-gray-600">
                            {{ $poblacionesProducto->descripcion ?: 'Sin descripción' }}
                        </span>

                    </td>

                    {{-- ACCIONES --}}
                     <td class="whitespace-nowrap px-6 py-5">
                        <div class="flex items-center justify-center gap-2">
                            {{-- VER --}}
                            <x-frk.button-table-show
                                :href="route('poblacion-productos.show', $poblacionesProducto)"
                                title="Ver ficha" />
                            {{-- EDITAR --}}
                            <x-frk.button-table-edit
                                :href="route('poblacion-productos.edit', $poblacionesProducto)"
                                title="Editar ficha" />
                            {{-- ELIMINAR --}}
                            <x-frk.button-table-delete
                                :action="route('poblacion-productos.destroy', $poblacionesProducto)"
                                title="Eliminar ficha"
                                message="¿Seguro que deseas eliminar permanentemente esta ficha?" />
                        </div>
                    </td>

                </tr>

            @empty

                <tr>

                    <td
                        colspan="4"
                        class="px-6 py-12 text-center"
                    >

                        <div class="flex flex-col items-center justify-center">

                            <svg
                                class="h-12 w-12 text-gray-300 mb-3"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="1.5"
                                    d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7
                                       m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5
                                       m16 0H4"
                                />
                            </svg>

                            <p class="text-gray-500 font-medium">
                                No existen poblaciones de productos registradas.
                            </p>

                            <p class="text-sm text-gray-400 mt-1">
                                Utilice el botón "Crear" para agregar una.
                            </p>

                        </div>

                    </td>

                </tr>

            @endforelse

        </tbody>

    </table>

</div>
