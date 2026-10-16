<div class="overflow-x-auto">
    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                    Código
                </th>
                <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                    Cantidad
                </th>
                <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                    Unidad
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
            @forelse($tamaniosPorciones as $tamanio)
                <tr class="hover:bg-gray-50 transition">
                    {{-- CÓDIGO --}}
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="font-semibold text-gray-800">
                            {{ $tamanio->codigo }}
                        </span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="font-semibold text-gray-800">
                            {{ $tamanio->cantidad }}
                        </span>
                    </td>
                    {{-- UNIDAD --}}
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="inline-flex items-center rounded-full
                                     bg-indigo-50 px-3 py-1
                                     text-sm font-medium text-indigo-700">
                            {{ $tamanio->unidad }}
                        </span>
                    </td>
                    {{-- DESCRIPCIÓN --}}
                    <td class="px-6 py-4">
                        <span class="text-sm text-gray-600">
                            {{ $tamanio->descripcion ?: 'Sin descripción' }}
                        </span>

                    </td>

                    {{-- ACCIONES --}}
                    <td class="px-6 py-4">

                        <div class="flex items-center justify-center gap-2">

                            {{-- VER --}}
                            <a
                                href="{{ route('tamanio-porcions.show', $tamanio) }}"
                                class="inline-flex items-center justify-center
                                       rounded-lg bg-blue-50 px-3 py-2
                                       text-sm font-medium text-blue-700
                                       hover:bg-blue-100 transition"
                                title="Ver"
                            >

                                <svg
                                    class="h-4 w-4"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M15 12a3 3 0 11-6 0
                                           3 3 0 016 0z"
                                    />

                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M2.458 12C3.732 7.943
                                           7.523 5 12 5
                                           c4.478 0 8.268 2.943
                                           9.542 7
                                           -1.274 4.057-5.064 7
                                           -9.542 7
                                           -4.477 0-8.268-2.943
                                           -9.542-7z"
                                    />
                                </svg>

                            </a>

                            {{-- EDITAR --}}
                            <a
                                href="{{ route('tamanio-porcions.edit', $tamanio) }}"
                                class="inline-flex items-center justify-center
                                       rounded-lg bg-amber-50 px-3 py-2
                                       text-sm font-medium text-amber-700
                                       hover:bg-amber-100 transition"
                                title="Editar"
                            >

                                <svg
                                    class="h-4 w-4"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M11 5H6a2 2 0 00-2 2v11
                                           a2 2 0 002 2h11
                                           a2 2 0 002-2v-5"
                                    />

                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M18.5 2.5a2.121 2.121
                                           0 013 3L12 15l-4 1
                                           1-4 9.5-9.5z"
                                    />
                                </svg>

                            </a>

                            {{-- ELIMINAR --}}
                            <form
                                method="POST"
                                action="{{ route('tamanio-porcions.destroy', $tamanio) }}"
                                onsubmit="return confirm('¿Está seguro de eliminar este registro?')"
                            >

                                @csrf
                                @method('DELETE')

                                <button
                                    type="submit"
                                    class="inline-flex items-center justify-center
                                           rounded-lg bg-red-50 px-3 py-2
                                           text-sm font-medium text-red-700
                                           hover:bg-red-100 transition"
                                    title="Eliminar"
                                >

                                    <svg
                                        class="h-4 w-4"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M19 7l-.867 12.142
                                               A2 2 0 0116.138 21H7.862
                                               a2 2 0 01-1.995-1.858L5 7
                                               m5 4v6m4-6v6M9 7V4
                                               a1 1 0 011-1h4a1 1 0 011 1v3
                                               m-9 0h14"
                                        />
                                    </svg>

                                </button>

                            </form>

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
                            <p class="text-gray-500 font-medium">
                                No existen tamaños de porción registrados.
                            </p>
                            <p class="text-sm text-gray-400 mt-1">
                                Utilice el botón "Crear" para agregar uno.
                            </p>
                        </div>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
