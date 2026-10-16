<x-app-layout>
<div class="bg-white p-6 rounded-lg shadow border border-gray-200">
    <div class="p-8">

    <x-frk.page-header
        title="Detalle de Porción"
        subtitle="Consulta de información" />

        @include('porcion-productos._form', [
            'porcion' => $porcionProducto,
            'readonly' => true
        ])
    </div>
</div>

</x-app-layout>
