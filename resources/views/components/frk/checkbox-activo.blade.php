@props([
    'name' => 'activo',
    'label' => 'Producto activo',
    'description' => 'Indica si el producto está disponible para utilizarse en el sistema.',
    'value' => true,
    'readonly' => false,
])

<div {{ $attributes->merge(['class' => 'sm:col-span-3']) }}>
    <div class="flex items-center gap-3">
        <input type="hidden" name="{{ $name }}" value="0">

        <input
            type="checkbox"
            id="{{ $name }}"
            name="{{ $name }}"
            value="1"
            @checked(old($name, $value))
            @disabled($readonly)
            class="h-5 w-5 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500"
        >

        <label for="{{ $name }}" class="text-sm font-medium text-gray-700">
            {{ $label }}
        </label>
    </div>

    <p class="mt-1 text-xs text-gray-500">
        {{ $description }}
    </p>

    @error($name)
        <p class="mt-1 text-sm text-red-600">
            {{ $message }}
        </p>
    @enderror
</div>
