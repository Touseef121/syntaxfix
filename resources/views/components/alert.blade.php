@props([
    'type' => 'success', // success, error, warning, info
    'message'
])

<div {{ $attributes->merge(['class' => "p-4 rounded-md text-sm mb-4 flex items-start space-x-2"]) }}
     x-data="{ show: true }" x-show="show" x-transition.duration.300ms>
    @if($type === 'success')
        <svg class="w-5 h-5 text-green-500 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
        </svg>
    @elseif($type === 'error')
        <svg class="w-5 h-5 text-red-500 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
        </svg>
    @elseif($type === 'warning')
        <svg class="w-5 h-5 text-yellow-500 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4m0 4h.01M4.93 19h14.14c1.1 0 1.66-1.26.93-2.07L13 4.93c-.73-.81-2.26-.81-2.99 0L4 16.93c-.73.81-.17 2.07.93 2.07z"/>
        </svg>
    @endif

    <div class="flex-1 text-gray-700">
        {{ $message }}
    </div>

    <button type="button" class="ml-2 text-gray-500 hover:text-gray-700" @click="show = false">&times;</button>
</div>
