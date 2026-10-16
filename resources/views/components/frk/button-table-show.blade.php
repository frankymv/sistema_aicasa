@props([
    'href',
    'title' => 'Ver registro',
])

<a href="{{ $href }}"
   title="{{ $title }}"
   {{ $attributes->merge([
       'class' => 'inline-flex items-center justify-center rounded-lg
                                       bg-blue-50 px-3 py-2 text-sm font-medium
                                       text-blue-700 hover:bg-blue-100 transition'
   ]) }}>

    <svg class="h-4 w-4"
         fill="none"
         stroke="currentColor"
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
            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
    </svg>

</a>
