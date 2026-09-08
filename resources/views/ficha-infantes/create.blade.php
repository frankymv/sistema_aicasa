<x-app-layout>
    <div class="bg-white p-6 rounded-lg shadow border border-gray-200">
           {{-- ALERTA --}}
        @if(session('error'))
            <div class="flex items-start gap-3 rounded-xl border border-emerald-200
                        bg-emerald-50 p-4 text-emerald-800 shadow-sm">

                <div class="flex h-8 w-8 shrink-0 items-center justify-center rounded-full bg-emerald-100">
                    <svg class="h-5 w-5 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5 13l4 4L19 7"/>
                    </svg>
                </div>

                <div>
                    <p class="font-semibold">Atencion</p>
                    <p class="text-sm text-emerald-700">
                        {{ session('error') }}
                    </p>
                </div>
            </div>
        @endif

        <div class="p-8">
            <h2 class="text-2xl font-bold text-gray-800 mb-6">Nueva Ficha de Infante</h2>
            <form action="{{ route('ficha-infantes.store') }}" method="POST" x-data="{ enviando: false }" @submit="enviando = true">
                @include('ficha-infantes._form', ['readonly' => false])
            </form>
        </div>
    </div>
    
</x-app-layout>