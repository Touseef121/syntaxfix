<div
    x-data="{ show: @entangle('message').defer }"
    x-show="show"
    x-init="if (show) { setTimeout(() => show = false, 4000) }"
    x-transition:enter="transform ease-out duration-300 transition"
    x-transition:enter-start="translate-y-2 opacity-0 sm:translate-y-0 sm:translate-x-2"
    x-transition:enter-end="translate-y-0 opacity-100 sm:translate-x-0"
    x-transition:leave="transition ease-in duration-100"
    x-transition:leave-start="opacity-100"
    x-transition:leave-end="opacity-0"
    class="fixed top-4 right-4 z-50 w-auto max-w-sm"
>
    <div
        class="flex items-center gap-2 px-4 py-3 rounded-lg shadow-lg text-white"
        :class="{
            'bg-green-500': @js($type) === 'success',
            'bg-red-500': @js($type) === 'error',
            'bg-blue-500': @js($type) === 'info'
        }"
    >
        <!-- ✅ Icon -->
        <template x-if="@js($type) === 'success'">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
            </svg>
        </template>
        <template x-if="@js($type) === 'error'">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
            </svg>
        </template>
        <template x-if="@js($type) === 'info'">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M12 18h.01"/>
            </svg>
        </template>

        <!-- ✅ Message -->
        <span class="text-sm font-medium" x-text="@js($message)"></span>
    </div>
</div>
