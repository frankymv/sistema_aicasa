<x-app-layout>

<div class="space-y-6">

    {{-- ENCABEZADO --}}
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">

        <x-frk.page-header
            title="Tamaños de Porciones"
            subtitle="Gestión de unidades y tamaños de porción"
        />

        <x-frk.button-create
            :href="route('tamanio-porcions.create')"
        />

    </div>

    {{-- ALERTA --}}
    @if(session('success'))

        <x-frk.alert type="success" title="¡Éxito!">
            {{ session('success') }}
        </x-frk.alert>

    @endif

    {{-- CONTENEDOR --}}
    <div class="overflow-hidden rounded-2xl border border-gray-200 bg-white shadow-sm">

        <x-frk.tamanio-table :tamaniosPorciones="$tamaniosPorciones" />

        {{-- PAGINACIÓN --}}
        <x-frk.pagination-table
            :paginator="$tamaniosPorciones"
        />

    </div>

</div>

</x-app-layout>
