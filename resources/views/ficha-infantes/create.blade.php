<x-app-layout>
    <div class="bg-white p-6 rounded-lg shadow border border-gray-200">
        @if(session('success'))
            <x-frk.alert type="success" title="¡Éxito!">
                {{ session('success') }}
            </x-frk.alert>
        @endif

        @if(session('error'))
            <x-frk.alert type="error" title="Atención">
                {{ session('error') }}
            </x-frk.alert>
        @endif

        <div class="p-8" x-data="{ enviando: false }">
            <h2 class="text-2xl font-bold text-gray-800 mb-6">Nueva Ficha de Infante</h2>
            <form method="POST"
                action="{{ route('ficha-infantes.store') }}"
                @submit="enviando = true">
                @csrf
                @include('ficha-infantes._form', ['readonly' => false])
            </form>
        </div>
    </div>

</x-app-layout>
