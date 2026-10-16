<x-app-layout>

    <div class="space-y-6">

        {{-- ENCABEZADO --}}
        <div class="flex flex-col md:flex-row
                    md:items-center md:justify-between gap-4">

            <x-frk.page-header
                title="Productos"
                subtitle="Gestión de productos registrados"
            />

            <x-frk.button-create
                :href="route('productos.create')"
            />

        </div>

        {{-- ALERTA --}}
        @if(session('success'))

            <x-frk.alert
                type="success"
                title="¡Éxito!"
            >
                {{ session('success') }}
            </x-frk.alert>

        @endif

        {{-- TABLA --}}
        <div class="overflow-hidden rounded-2xl
                    border border-gray-200 bg-white shadow-sm">




            <x-frk.productos-table
                :productos="$productos"
            />
            <x-frk.pagination-table
                :paginator="$productos"
            />

        </div>

    </div>

</x-app-layout>
