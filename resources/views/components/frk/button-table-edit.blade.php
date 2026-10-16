@props([
    'href',
    'title' => 'Editar registro',
])

<a href="{{ $href }}"
   title="{{ $title }}"
   {{ $attributes->merge([
       'class' => 'inline-flex items-center justify-center rounded-lg
                                       bg-amber-50 px-3 py-2 text-sm font-medium
                                       text-amber-700 hover:bg-amber-100 transition'
   ]) }}>

 <svg class="h-4 w-4" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
        <path
            stroke-linecap="round"
            stroke-linejoin="round"
            stroke-width="2"
            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />

        <path
            stroke-linecap="round"
            stroke-linejoin="round"
            stroke-width="2"
            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
    </svg>
</a>
