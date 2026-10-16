<x-app-layout>

<div class="bg-white p-6 rounded-lg shadow border border-gray-200">

    @if(session('error'))

        <div class="flex items-start gap-3 rounded-xl border border-red-200
                    bg-red-50 p-4 text-red-800 shadow-sm mb-6">

            <div>
                <p class="font-semibold">
                    Atención
                </p>

                <p class="text-sm text-red-700">
                    {{ session('error') }}
                </p>
            </div>

        </div>

    @endif

    <div
        class="p-8"
        x-data="{ enviando: false }"
    >

        <h2 class="text-2xl font-bold text-gray-800 mb-6">
            Editar Tamaño de Porción
        </h2>

        <form
            method="POST"
            action="{{ route('tamanio-porcions.update', $tamanioPorcion) }}"
            @submit="enviando = true"
        >

            @csrf
            @method('PUT')

            @include('tamanio-porcions._form', [
                'readonly' => false
            ])

        </form>

    </div>

</div>

</x-app-layout>
