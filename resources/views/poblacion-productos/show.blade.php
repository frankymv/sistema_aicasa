<x-app-layout>
<div class="bg-white p-6 rounded-lg shadow border border-gray-200">
    <div class="p-8">
        <x-frk.page-header
        title="Detalle de Población de Producto"
        subtitle="Información registrada de la población objetivo." />


        @include('poblacion-productos._form', [
            'poblacionProducto' => $poblacionProducto,
            'readonly' => $readonly
        ])

    </div>

</div>

</x-app-layout>
