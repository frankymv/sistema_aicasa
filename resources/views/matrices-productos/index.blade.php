<x-app-layout>


<div class="space-y-6">

  {{-- ENCABEZADO --}}
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
        <x-frk.page-header
            title="Matrices Productos"
            subtitle="Gestión y seguimiento de infantes registrados" />
        <x-frk.button-create :href="route('matrices-productos.create')" />
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
        <x-frk.matriz-table :matrices="$matrices" />
        {{-- PAGINACIÓN --}}
        <x-frk.pagination-table :paginator="$matrices" />

    </div>

</div>


</x-app-layout>
