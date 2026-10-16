{{-- resources/views/components/alert.blade.php --}}
@props(['type' => 'success', 'title' => 'Atención'])

@php
    // Definimos los estilos e iconos según el tipo de alerta
    $styles = [
        'success' => [
            'wrapper' => 'border-emerald-200 bg-emerald-50 text-emerald-800',
            'iconBg'  => 'bg-emerald-100',
            'icon'    => 'text-emerald-600',
            'text'    => 'text-emerald-700',
            'svg'     => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>' // Checkmark
        ],
        'error' => [
            'wrapper' => 'border-rose-200 bg-rose-50 text-rose-800',
            'iconBg'  => 'bg-rose-100',
            'icon'    => 'text-rose-600',
            'text'    => 'text-rose-700',
            'svg'     => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>' // Triángulo advertencia
        ],
    ];

    $current = $styles[$type] ?? $styles['success'];
@endphp

<div {{ $attributes->merge(['class' => 'flex items-start gap-3 rounded-xl border p-4 shadow-sm ' . $current['wrapper']]) }}>
    <div class="flex h-8 w-8 shrink-0 items-center justify-center rounded-full {{ $current['iconBg'] }}">
        <svg class="h-5 w-5 {{ $current['icon'] }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            {!! $current['svg'] !!}
        </svg>
    </div>

    <div>
        <p class="font-semibold">{{ $title }}</p>
        <p class="text-sm {{ $current['text'] }}">
            {{ $slot }}
        </p>
    </div>
</div>
