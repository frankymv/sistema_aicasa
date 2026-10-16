@props([
    'sexo' => '',
])

@if($sexo === 'Masculino')
    <span class="inline-flex items-center gap-1.5 rounded-full bg-blue-50 px-3 py-1 text-xs font-semibold text-blue-700">
        Masculino
    </span>
@else
    <span class="inline-flex items-center gap-1.5 rounded-full bg-pink-50 px-3 py-1 text-xs font-semibold text-pink-700">
        Femenino
    </span>
@endif
