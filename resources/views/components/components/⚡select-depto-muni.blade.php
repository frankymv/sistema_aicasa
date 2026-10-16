<?php

namespace App\Livewire;

use Livewire\Component;

new class extends Component
{

}; ?>

<div class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm">
    <h2 class="text-lg font-bold text-gray-900">
        2. Peso
    </h2>
    <div class="mt-5 grid grid-cols-1 gap-5 md:grid-cols-3">
        <div>
            <label class="text-sm font-semibold text-gray-700">
                Peso actual (kg) *
            </label>
            <input type="number"
                    wire:model.live="pesoactualcontrol"
                    step="0.01"
                    min="0"
                    value="{{ old('peso_actual_control') }}"
                    required
                    class="mt-2 w-full rounded-xl border-gray-300 focus:border-indigo-500 focus:ring-indigo-500">
        </div>
        <div>
            <label class="text-sm font-semibold text-gray-700">
                Peso ideal (kg)
            </label>
            <input type="number"
                    wire:model.live="peso_ideal_control"
                    name="peso_ideal_control"
                    step="0.01"
                    min="0"
                    value="{{ old('peso_ideal_control') }}"
                    class="mt-2 w-full rounded-xl border-gray-300 focus:border-indigo-500 focus:ring-indigo-500">
        </div>
        <div>
            <label class="text-sm font-semibold text-gray-700">
                Indicador P/E
            </label>
            <input type="text"
                    wire:model.live="indicador_pe"
                    name="peso_ideal_control"

                    value="{{ old('peso_ideal_control') }}"
                    class="mt-2 w-full rounded-xl border-gray-300 focus:border-indigo-500 focus:ring-indigo-500">
        </div>
    </div>
</div>
