@props([
    'infantes' => collect(),
])

<div class="overflow-x-auto">
    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
            <tr>
                <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">
                    Infante
                </th>
                <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">
                    Sexo
                </th>
                <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">
                    Encargado
                </th>
                <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">
                    Ubicación
                </th>
                <th class="px-6 py-4 text-center text-xs font-semibold uppercase tracking-wider text-gray-500">
                    Acciones
                </th>
            </tr>
        </thead>

        <tbody class="divide-y divide-gray-100 bg-white">
            @forelse($infantes as $infante)
                <tr class="group transition hover:bg-indigo-50/40">
                    {{-- INFANTE --}}
                    <td class="whitespace-nowrap px-6 py-5">
                        <div class="flex items-center gap-3">
                            <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-full
                                        bg-indigo-100 font-bold text-indigo-700">

                                {{ strtoupper(substr($infante->nombre_infante, 0, 1)) }}

                            </div>
                            <div>

                                <div class="font-semibold text-gray-900">
                                    {{ $infante->nombre_infante }}
                                </div>

                                <div class="mt-0.5 text-xs text-gray-500">
                                    Código:
                                    <span class="font-mono font-semibold text-indigo-600">
                                        {{ $infante->codigo_infante }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </td>
                    {{-- SEXO --}}
                    <td class="whitespace-nowrap px-6 py-5">
                        <x-frk.badge-sexo :sexo="$infante->sexo_infante" />
                    </td>

                    {{-- ENCARGADO --}}
                    <td class="whitespace-nowrap px-6 py-5">
                        <div class="font-medium text-gray-900">
                            {{ $infante->nombre_encargado }}
                        </div>
                        <div class="mt-1 text-xs text-gray-500">
                            {{ ucfirst($infante->parentesco_encargado) }}
                        </div>
                        <div class="mt-1 flex items-center gap-1 text-xs text-gray-400">
                            <svg class="h-3.5 w-3.5" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 5a2 2 0 012-2h3.28a2 2 0 011.94 1.515L11 7a2 2 0 01-.45 1.86l-1.27 1.27a16 16 0 006.59 6.59l1.27-1.27A2 2 0 0119 15l2.485.78A2 2 0 0123 17.72V21a2 2 0 01-2 2C10.611 23 1 13.389 1 3a2 2 0 012-2z"/>
                            </svg>
                            {{ $infante->telefono_encargado }}
                        </div>
                    </td>
                    {{-- UBICACIÓN --}}
                    <td class="whitespace-nowrap px-6 py-5">
                        <div class="flex items-start gap-2">
                            <svg class="mt-0.5 h-5 w-5 text-gray-400" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17.657 16.657L13.414 20.9a2 2 0 01-2.828 0l-4.243-4.243a8 8 0 1111.314 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                            <div>
                                <div class="text-sm font-medium text-gray-700">
                                    {{ $infante->municipio_residencia_encargado }}
                                </div>
                                <div class="text-xs text-gray-400">
                                    {{ $infante->departamento_residencia_encargado }}
                                </div>
                            </div>
                        </div>
                    </td>

                    {{-- ACCIONES --}}
                    <td class="whitespace-nowrap px-6 py-5">
                        <div class="flex items-center justify-center gap-2">
                            {{-- VER --}}
                            <x-frk.button-table-show
                                :href="route('ficha-infantes.show', $infante)"
                                title="Ver ficha" />
                            {{-- EDITAR --}}
                            <x-frk.button-table-edit
                                :href="route('ficha-infantes.edit', $infante)"
                                title="Editar ficha" />
                            {{-- ELIMINAR --}}
                            <x-frk.button-table-delete
                                :action="route('ficha-infantes.destroy', $infante)"
                                title="Eliminar ficha"
                                message="¿Seguro que deseas eliminar permanentemente esta ficha?" />
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="px-6 py-16 text-center">
                        <h3 class="text-lg font-semibold text-gray-900">
                            No hay infantes registrados
                        </h3>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
