@props([
    'title',
])

<h3 {{ $attributes->merge([
    'class' => 'text-lg font-semibold leading-6 text-indigo-700 flex items-center gap-2'
]) }}>
    {{ $title }}
</h3>
