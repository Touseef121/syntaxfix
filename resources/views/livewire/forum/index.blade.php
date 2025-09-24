<div>
    <div class="container mx-auto px-4 sm:px-6 lg:px-10 py-6">
        <!-- Header -->
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-6">
            <h1 class="text-2xl font-bold text-themecolor">Latest Discussions</h1>
            @auth
            @if(Auth::user()->role === 'user' || Auth::user()->role === 'admin')
            <a href="{{route('forum.create')}}" class="flex items-center gap-2 bg-themecolor hover:bg-secondarycolor text-white px-4 py-2 rounded-lg font-medium w-full sm:w-auto justify-center">
                + New Discussion
            </a>
            @endif
            @endauth
        </div>

        <!-- Grid Layout -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

            <!-- Discussions Column -->
            <div class="lg:col-span-2 space-y-4">
                <!-- Discussion Card 1 -->
                @forelse ($forums as $data)
                <div class="bg-white shadow rounded-xl p-5">
                    <a href="">
                        <h2 class="font-bold text-xl text-gray-900">{{ $data->title }}</h2>
                        <p class="text-gray-600 mt-2 text-sm">{{ $data->description }}</p>
                    </a>

                    <div class="flex justify-between items-center mt-4 text-gray-500 text-sm">
                        <div class="flex items-center gap-2">
                            <img src="https://i.pravatar.cc/40?img=1" class="w-6 h-6 rounded-full">
                            <div>
                                <p class="font-semibold text-gray-800">
                                    {{$data->user->name}}
                                    <span class="text-xs text-gray-500"> {{ $data->created_at->diffForHumans() }}</span>
                                </p>
                            </div>
                        </div>

                        {{-- Like & Comment Section --}}
                        <div class="flex items-center gap-4">

                            {{-- Like Button --}}
                            @if(Auth::user())
                            <div class="flex items-center gap-1 cursor-pointer select-none" wire:click="toggleLike({{ $data->id }})">
                                @php
                                $liked = $data->likes->contains('user_id', auth()->id());
                                @endphp

                                @if($liked)
                                <!-- Filled Red Heart -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-500 fill-current" viewBox="0 0 24 24">
                                    <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z" />
                                </svg>
                                @else
                                <!-- Outline Heart -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z" />
                                </svg>
                                @endif

                                <span class="text-gray-700 font-medium">{{ $data->likes->count() }}</span>
                            </div>
                            @endif

                            {{-- Comment Count --}}
                            <span class="flex items-center gap-1">💬 23</span>
                        </div>
                    </div>
                </div>
                @empty
                <div class="text-center">No Forums Available!</div>
                @endforelse

            </div>

            <!-- Right Sidebar -->
            <aside class="space-y-6">
                <!-- Trending Categories -->
                <div class="bg-white shadow rounded-xl p-5">
                    <h2 class="font-bold text-gray-800 mb-4">🔥 Trending Categories</h2>
                    <ol class="space-y-3 text-sm text-gray-700">
                        @foreach($trendingCategories as $index => $category)
                        <li class="flex justify-between">
                            <span>
                                <span class="text-orange-500 font-bold">{{ $index + 1 }}.</span>
                                {{ $category->name }}
                            </span>
                            <span class="text-gray-500">🗂 {{ $category->forums_count }}</span>
                        </li>
                        @endforeach
                    </ol>
                </div>

                @if(Auth::user())
                <div class="bg-white shadow rounded-xl p-5">
                    <h2 class="font-bold text-gray-800 mb-4">👥 Most Active Users</h2>
                    <ul class="space-y-2 text-sm text-gray-700">
                        @foreach($activeUsers as $index => $user)
                        <li class="flex justify-between">
                            <span class="flex items-center gap-2">
                                <span class="text-blue-600 font-bold">{{ $index + 1 }}.</span>
                                {{ $user->name }}
                            </span>
                            <span class="text-gray-500">{{ $user->forums_count }} posts</span>
                        </li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <div class="bg-white shadow rounded-xl p-5">
                    <h2 class="font-bold text-gray-800 mb-4">❤️ Most Liked Posts</h2>
                    <ul class="space-y-2 text-sm text-gray-700">
                        @foreach($mostLikedPosts as $index => $forum)
                        @if($forum->likes_count > 0)
                        <li class="flex justify-between">
                            <span class="flex items-center gap-2">
                                <span class="text-red-600 font-bold">{{ $index + 1 }}.</span>
                                <a {{-- href="{{ route('forum.show', $forum->id) }}" --}} class="hover:underline cursor-pointer" title="{{ $forum->title }}">
                                    {{ \Illuminate\Support\Str::limit($forum->title, 15) }}
                                </a>
                            </span>
                            <span class="text-gray-500">{{ $forum->likes_count }} likes</span>
                        </li>
                        @endif
                        @endforeach
                    </ul>
                </div>

            </aside>
        </div>
    </div>
</div>
