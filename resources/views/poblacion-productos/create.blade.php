<x-app-layout>
    <div class="bg-white p-6 rounded-lg shadow border border-gray-200">
        {{-- ALERTA --}}
        @if(session('error'))
            <div class="flex items-start gap-3 rounded-xl border border-red-200
                        bg-red-50 p-4 text-red-800 shadow-sm mb-6">
                <div class="flex h-8 w-8 shrink-0 items-center justify-center rounded-full bg-red-100">
                    <svg
                        class="h-5 w-5 text-red-600"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M6 18L18 6M6 6l12 12"
                        />
                    </svg>
                </div>
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
        <div class="p-8">
            <x-frk.page-header
                title="Nueva Poblacion de Producto"
                subtitle="Ingreso de información" />

            <form
                method="POST"
                action="{{ route('poblacion-productos.store') }}"
                x-data="{ enviando: false }"
                @submit="enviando = true"
            >
                @csrf
                @include('poblacion-productos._form', [
                    'readonly' => false
                ])
            </form>
        </div>
    </div>
</x-app-layout>
