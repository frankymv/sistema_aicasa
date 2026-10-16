@props([
    'title',
    'subtitle' => null,
])

<div class="flex items-center gap-3">
    <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-indigo-100 text-indigo-600">
        <svg class="h-7 w-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
        </svg>
    </div>

    <div>
        <h1 class="text-2xl font-bold text-gray-900">
            {{ $title }}
        </h1>

        @if($subtitle)
            <p class="text-sm text-gray-500">
                {{ $subtitle }}
            </p>
        @endif
    </div>
</div>