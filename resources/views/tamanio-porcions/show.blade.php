<x-app-layout>

<div class="bg-white p-6 rounded-lg shadow border border-gray-200">

    <div class="p-8">

        <div class="flex flex-col md:flex-row md:items-center
                    md:justify-between gap-4 mb-8">

            <div>

                <h2 class="text-2xl font-bold text-gray-800">
                    Detalle del Tamaño de Porción
                </h2>

                <p class="text-sm text-gray-500 mt-1">
                    Información registrada del tamaño de porción.
                </p>

            </div>

            <a
                href="{{ route('tamanio-porcions.edit', $tamanioPorcion) }}"
                class="inline-flex items-center justify-center
                       rounded-md bg-indigo-600 px-4 py-2
                       text-sm font-medium text-white
                       shadow-sm hover:bg-indigo-700 transition"
            >
                Editar
            </a>

        </div>

        @include('tamanio-porcions._form', [
            'tamaniosPorcione' => $tamanioPorcion,
            'readonly' => true
        ])

    </div>

</div>

</x-app-layout>
