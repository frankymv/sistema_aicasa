<x-app-layout>
    <div class="space-y-6">
        {{-- ENCABEZADO --}}
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
            <x-frk.page-header
                title="Fichas Infantes"
                subtitle="Gestión y seguimiento de infantes registrados" />
            <x-frk.button-create :href="route('ficha-infantes.create')" />
        </div>

        {{-- ALERTA --}}
        @if(session('success'))
            <x-frk.alert type="success" title="¡Éxito!">
                {{ session('success') }}
            </x-frk.alert>
        @endif

        {{-- CONTENEDOR PRINCIPAL --}}
        <div class="overflow-hidden rounded-2xl border border-gray-200 bg-white shadow-sm">
            {{-- TABLA --}}
            <x-frk.infantes-table :infantes="$infantes" />
            {{-- PAGINACIÓN --}}
            <x-frk.pagination-table :paginator="$infantes" />
        </div>
    </div>
</x-app-layout>
