<x-app-layout>
<div class="max-w-7xl mx-auto">
        {{-- ENCABEZADO --}}
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
        <x-frk.page-header
            title="Porciones de Productos"
            subtitle="Administración de porciones"
        />
        <x-frk.button-create
            :href="route('porcion-productos.create')"
        />
    </div>

    <div class="bg-white rounded-xl shadow overflow-hidden">
        <x-frk.table-porcion-productos
            :porciones="$porciones" />
    </div>

    <div class="mt-4">
        {{ $porciones->links() }}
    </div>

</div>

</x-app-layout>
