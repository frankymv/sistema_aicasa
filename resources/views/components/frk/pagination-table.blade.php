{{-- resources/views/components/pagination-footer.blade.php --}}
@props(['paginator'])

@if($paginator->hasPages())
    <div {{ $attributes->merge(['class' => 'border-t border-gray-200 bg-gray-50 px-6 py-4']) }}>
        <div class="flex flex-col items-center justify-between gap-3 sm:flex-row">
            <p class="text-sm text-gray-500">
                Mostrando
                <span class="font-semibold text-gray-700">
                    {{ $paginator->firstItem() ?? 0 }}
                </span>
                -
                <span class="font-semibold text-gray-700">
                    {{ $paginator->lastItem() ?? 0 }}
                </span>
                de
                <span class="font-semibold text-gray-700">
                    {{ $paginator->total() }}
                </span>
                registros
            </p>

            <div>
                {{ $paginator->links() }}
            </div>
        </div>
    </div>
@endif
