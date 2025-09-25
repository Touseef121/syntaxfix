<div>
    <aside class="w-64 bg-white h-screen p-6 overflow-auto">

        <!-- Categories -->
        <h2 class="text-lg font-semibold text-gray-800 mb-4">Categories</h2>

        <nav class="space-y-2 mb-6">
            <button wire:click="setCategory(null)" @class([ 'w-full flex items-center justify-between px-3 py-2 rounded-lg text-sm font-medium transition-colors' , 'bg-themecolor text-white'=> $activeCategory === null,
                'text-gray-700 hover:bg-gray-100' => $activeCategory !== null,
                ])>
                All Discussions
            </button>

            @foreach($categories as $category)
            <button wire:click="setCategory({{ $category->id }})" @class([ 'w-full flex items-center justify-between px-3 py-2 rounded-lg text-sm font-medium transition-colors' , 'bg-themecolor text-white'=> $activeCategory === $category->id,
                'text-themecolor hover:bg-gray-100' => $activeCategory !== $category->id,
                ])
                >
                <span>{{ $category->name }}</span>
                <span @class([ 'text-sm px-2 py-0.5 rounded-full font-semibold' , 'bg-gray-100 text-maincolor'=> $activeCategory !== $category->id,
                    'bg-maincolor text-white' => $activeCategory === $category->id,
                    ])>
                    {{ $category->forums_count }}
                </span> </button>
            @endforeach
        </nav>

        <!-- Quick Stats -->
        @if(Auth::user())
        <div class="mt-8">
            <h2 class="text-lg font-semibold text-gray-800 mb-2">Quick Stats</h2>
            <div class="space-y-1 text-gray-700 text-sm">
                <div class="flex justify-between">
                    <span>Total Threads</span>
                    <span class="text-blue-600 font-semibold">{{ $totalThreads }}</span>
                </div>
                <div class="flex justify-between">
                    <span>Active Users</span>
                    <span class="text-blue-600 font-semibold">{{ $activeUsers }}</span>
                </div>
                <div class="flex justify-between">
                    <span>Online Now</span>
                    <span class="text-orange-400 font-semibold">{{ $onlineNow }}</span>
                </div>
            </div>
        </div>
        @endif

    </aside>
</div>
