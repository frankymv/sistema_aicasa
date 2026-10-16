<x-app-layout>
    <div class="bg-white p-6 rounded-lg shadow border border-gray-200">
        <div class="p-8">
            <h2 class="text-2xl font-bold text-gray-800 mb-6">Editar Ficha de Infante</h2>
            <form action="{{ route('matrices-productos.update',$matricesProducto) }}" method="POST" x-data="{ enviando: false }" @submit="enviando = true">
                @method('PUT')
                @include('matrices-productos._form', ['readonly' => false])
            </form>
        </div>
    </div>
</x-app-layout>
