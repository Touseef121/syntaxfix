<div>
    <div data-slot="card" class="bg-card text-card-foreground flex flex-col rounded-xl mb-6">
        <div data-slot="card-content" class="px-6 pt-6">
            <div class="flex flex-col md:flex-row items-start md:items-center space-y-4 md:space-y-0 md:space-x-6">
                <span data-slot="avatar" class="relative flex size-8 shrink-0 overflow-hidden rounded-full h-24 w-24">
                    <img data-slot="avatar-image" class="aspect-square size-full" alt="johndoe" src="https://hebbkx1anhila5yf.public.blob.vercel-storage.com/attachments/gen-images/public/diverse-user-avatars-jNaliJbW5b5ccprrlYjj99XE0SOY9L.png">
                </span>
                <div class="flex-1">
                    <div class="flex items-center space-x-3 mb-2">
                        <h1 class="text-3xl font-bold text-[#1E3A8A]">{{ Auth::user()->name }}</h1>
                    </div>
                    <p class="text-gray-600 mb-4 max-w-2xl">Full-stack developer passionate about building great user
                        experiences. Love discussing web technologies, productivity tips, and career growth.</p>
                    <div class="flex flex-wrap items-center gap-4 text-sm text-gray-500 mb-4">
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-calendar w-4 h-4 mr-1">
                                <path d="M8 2v4"></path>
                                <path d="M16 2v4"></path>
                                <rect width="18" height="18" x="3" y="4" rx="2"></rect>
                                <path d="M3 10h18"></path>
                            </svg>
                            Joined over {{ Auth::user()->created_at->diffForHumans() }}
                        </div>
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-map-pin w-4 h-4 mr-1">
                                <path d="M20 10c0 4.993-5.539 10.193-7.399 11.799a1 1 0 0 1-1.202 0C9.539 20.193 4 14.993 4 10a8 8 0 0 1 16 0">
                                </path>
                                <circle cx="12" cy="10" r="3"></circle>
                            </svg>
                            San Francisco, CA
                        </div>
                        <div class="flex items-center"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-globe w-4 h-4 mr-1">
                                <circle cx="12" cy="12" r="10"></circle>
                                <path d="M12 2a14.5 14.5 0 0 0 0 20 14.5 14.5 0 0 0 0-20"></path>
                                <path d="M2 12h20"></path>
                            </svg>
                            <a href="https://johndoe.dev" target="_blank" rel="noopener noreferrer" class="text-[#2563EB] hover:underline">johndoe.dev</a>
                        </div>
                    </div>
                    <div class="flex items-center space-x-6 mb-4">
                        <div class="text-center">
                            <div class="text-2xl font-bold text-[#1E3A8A]">{{ $posts->count() }}</div>
                            <div class="text-sm text-gray-500">Posts</div>
                        </div>
                        <div class="text-center">
                            <div class="text-2xl font-bold text-[#1E3A8A]">{{ $replies->count() }}</div>
                            <div class="text-sm text-gray-500">Replies</div>
                        </div>
                        <div class="text-center">
                            <div class="text-2xl font-bold text-[#F59E0B]">{{$likes->count()}}</div>
                            <div class="text-sm text-gray-500">Likes</div>
                        </div>
                    </div>
                    <div class="flex space-x-3">
                        <button data-slot="button" class="inline-flex items-center justify-center gap-2 whitespace-nowrap rounded-md text-sm font-medium transition-all shrink-0 outline-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] border shadow-xs h-9 px-4 py-2 border-themecolor text-themecolor hover:bg-themecolor hover:text-white bg-transparent">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-square-pen w-4 h-4 mr-2">
                                <path d="M12 3H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                <path d="M18.375 2.625a1 1 0 0 1 3 3l-9.013 9.014a2 2 0 0 1-.853.505l-2.873.84a.5.5 0 0 1-.62-.62l.84-2.873a2 2 0 0 1 .506-.852z">
                                </path>
                            </svg>Edit Profile</button><button data-slot="button" class="inline-flex items-center justify-center gap-2 whitespace-nowrap rounded-md text-sm font-medium transition-all disabled:pointer-events-none disabled:opacity-50 [&amp;_svg]:pointer-events-none [&amp;_svg:not([class*='size-'])]:size-4 shrink-0 [&amp;_svg]:shrink-0 outline-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20  aria-invalid:border-destructive border bg-background shadow-xs hover:bg-accent hover:text-accent-foreground    h-9 px-4 py-2 has-[&gt;svg]:px-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-settings w-4 h-4 mr-2">
                                <path d="M12.22 2h-.44a2 2 0 0 0-2 2v.18a2 2 0 0 1-1 1.73l-.43.25a2 2 0 0 1-2 0l-.15-.08a2 2 0 0 0-2.73.73l-.22.38a2 2 0 0 0 .73 2.73l.15.1a2 2 0 0 1 1 1.72v.51a2 2 0 0 1-1 1.74l-.15.09a2 2 0 0 0-.73 2.73l.22.38a2 2 0 0 0 2.73.73l.15-.08a2 2 0 0 1 2 0l.43.25a2 2 0 0 1 1 1.73V20a2 2 0 0 0 2 2h.44a2 2 0 0 0 2-2v-.18a2 2 0 0 1 1-1.73l.43-.25a2 2 0 0 1 2 0l.15.08a2 2 0 0 0 2.73-.73l.22-.39a2 2 0 0 0-.73-2.73l-.15-.08a2 2 0 0 1-1-1.74v-.5a2 2 0 0 1 1-1.74l.15-.09a2 2 0 0 0 .73-2.73l-.22-.38a2 2 0 0 0-2.73-.73l-.15.08a2 2 0 0 1-2 0l-.43-.25a2 2 0 0 1-1-1.73V4a2 2 0 0 0-2-2z">
                                </path>
                                <circle cx="12" cy="12" r="3"></circle>
                            </svg>
                            Settings
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="flex flex-col gap-2">
        <div class="bg-gray-100 text-muted-foreground h-9 items-center justify-center rounded-lg p-[3px] grid w-full grid-cols-4">
            <button wire:click="setTab('posts')" class="{{ $activeTab==='posts' ? 'bg-white shadow-sm rounded-md py-[3px]' : '' }} ...">
                Posts ({{ $posts->count() }})
            </button>
            <button wire:click="setTab('replies')" class="{{ $activeTab==='replies' ? 'bg-white shadow-sm rounded-md py-[3px]' : '' }} ...">
                Replies ({{ $replies->count() }})
            </button>
            <button wire:click="setTab('saved')" class="{{ $activeTab==='saved' ? 'bg-white shadow-sm' : '' }} ...">
                Saved ({{ $saved->count() }})
            </button>
            <button wire:click="setTab('activity')" class="{{ $activeTab==='activity' ? 'bg-white shadow-sm rounded-md py-[3px]' : '' }} ...">
                Activity
            </button>
        </div>

        <div class="flex-1 outline-none border p-3 mt-3 rounded-md shadow-lg">
            <div class="mt-3 space-y-4">
                {{-- Posts --}}
                {{-- Posts --}}
                @if($activeTab === 'posts')
                @foreach($posts as $post)
                <a href="#" class="block">
                    <div class="bg-white border rounded-xl shadow-md hover:shadow-lg transition p-4 cursor-pointer">
                        <h3 class="text-lg font-semibold text-themecolor hover:text-secondarycolor">
                            {{ $post->title }}
                        </h3>
                        <p class="text-sm text-gray-600 mt-1">
                            {{ Str::limit($post->description, 120) }}
                        </p>
                        <div class="flex justify-end items-center mt-3 space-x-4 text-xs text-gray-500">
                            {{-- Comments --}}
                            <div class="flex items-center space-x-1">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 text-gray-400">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M7.5 8.25h9m-9 3.75h6m-10.5 1.5a2.25 2.25 0 01-2.25-2.25v-9A2.25 2.25 0 014.5 0h15a2.25 2.25 0 012.25 2.25v9A2.25 2.25 0 0119.5 13.5H6.75L3 16.5V13.5z" />
                                </svg>
                                <span>{{ $post->comments_count }}</span>
                            </div>

                            {{-- Likes --}}
                            <div class="flex items-center space-x-1">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 text-red-500">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
                                </svg>
                                <span>{{ $post->likes_count }}</span>
                            </div>

                            {{-- Time --}}
                            <span class="text-gray-400">{{ $post->created_at->diffForHumans() }}</span>
                        </div>
                    </div>
                </a>
                @endforeach

                <div class="mt-4 bg-white">
                    {{ $posts->links() }}
                </div>

                {{-- Replies --}}
                @elseif($activeTab === 'replies')
                @forelse($replies as $reply)
                <a href="#" class="block">
                    <div class="bg-white border rounded-xl shadow-md hover:shadow-lg transition p-4 cursor-pointer">
                        <p class="text-sm text-gray-700">{{ $reply->comment }}</p>
                        <div class="flex justify-end mt-3">
                            <span class="text-xs text-gray-400">
                                {{ $reply->created_at->diffForHumans() }}
                            </span>
                        </div>
                    </div>
                </a>
                @empty
                <p class="text-gray-500 text-center">No replies yet</p>
                @endforelse



                {{-- Saved --}}
                @elseif($activeTab === 'saved')
                @forelse($saved as $forum)
                <div class="bg-white border rounded-xl shadow-md hover:shadow-lg transition p-4">
                    <a href="" class="text-lg font-semibold text-blue-600 hover:underline">
                        {{ $forum->title }}
                    </a>
                    <div class="flex justify-end mt-3">
                        <span class="text-xs text-gray-400">
                            {{ $forum->created_at->diffForHumans() }}
                        </span>
                    </div>
                </div>
                @empty
                <p class="text-gray-500 text-center">No saved forums</p>
                @endforelse

                {{-- Activity --}}
                @elseif($activeTab === 'activity')
                @forelse($activity as $act)
                <div class="bg-white border rounded-xl shadow-md hover:shadow-lg transition p-4">
                    <p class="text-sm text-gray-700">{{ $act->description }}</p>
                    <div class="flex justify-end mt-3">
                        <span class="text-xs text-gray-400">
                            {{ $act->created_at->diffForHumans() }}
                        </span>
                    </div>
                </div>
                @empty
                <p class="text-gray-500 text-center">No activity recorded</p>
                @endforelse
                @endif
            </div>
        </div>

    </div>
</div>
