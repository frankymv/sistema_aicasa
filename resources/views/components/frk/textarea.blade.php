{{-- resources/views/components/textarea.blade.php --}}

@props([
    'label',
    'name',
    'type' => 'textarea',
    'value' => '',
    'rows' => 4,
    'readonly' => false,
    'required' => false
])

<div>
    @if(isset($label))
        <label for="{{ $name }}" class="block text-sm font-medium text-gray-700">
            {{ $label }}
            @if($required)
                <span class="text-red-500">*</span>
            @endif
        </label>
    @endif

     <textarea
        name="{{ $name }}"
        id="{{ $name }}"
        rows="{{ $rows }}"
        @disabled($readonly)
        @required($required)
        {{ $attributes->merge([
            'class' => 'mt-1 block w-full rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm p-2 border disabled:bg-gray-100 disabled:text-gray-600 ' .
            ($errors->has($name) ? 'border-red-500 focus:border-red-500 focus:ring-red-500' : 'border-gray-300')
        ]) }}
    >{{ $slot }}</textarea>

    @error($name)
        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
    @enderror
</div>
