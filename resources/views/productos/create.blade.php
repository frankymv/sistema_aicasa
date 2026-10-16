<x-app-layout>

    <div class="bg-white p-6 rounded-lg shadow border border-gray-200">

        @if(session('error'))

            <div class="mb-6 rounded-xl border border-red-200
                        bg-red-50 p-4 text-red-800">

                <p class="font-semibold">
                    Atención
                </p>

                <p class="text-sm">
                    {{ session('error') }}
                </p>

            </div>

        @endif

        <div
            class="p-8"
            x-data="{ enviando: false }"
        >

            <h2 class="text-2xl font-bold text-gray-800 mb-6">
                Nuevo Producto
            </h2>

            <form
                method="POST"
                action="{{ route('productos.store') }}"
                @submit="enviando = true"
            >

                @csrf

                @include('productos._form', [
                    'readonly' => false
                ])

            </form>

        </div>

    </div>

</x-app-layout>
