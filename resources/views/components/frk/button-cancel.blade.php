@props([
    'href',
    'text' => 'Cancelar'
])
 <a href="{{ $href }}" 
    {{ $attributes->merge(['class' => 'inline-flex items-center justify-center gap-2 rounded-xl bg-gray-600 px-5 py-3 text-sm font-semibold text-white shadow-sm transition hover:bg-gray-700 hover:shadow-md focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2']) }}>
    {{ $text }}
</a>      