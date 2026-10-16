@props([
    'action',
    'title' => 'Eliminar registro',
    'message' => '¿Seguro que deseas eliminar este registro?',
])

<form action="{{ $action }}" method="POST"   >
    @csrf
    @method('DELETE')
    <button
        type="submit"
        title="{{ $title }}"
        {{ $attributes->merge([
            'class' => 'inline-flex items-center justify-center rounded-lg
                                           bg-red-50 px-3 py-2 text-sm font-medium
                                           text-red-700 hover:bg-red-100 transition'
        ]) }}>

        <svg class="h-4 w-4"
             fill="none"
             stroke="currentColor"
             viewBox="0 0 24 24">
            <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
        </svg>

    </button>
</form>
