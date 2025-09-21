<div>
    <div class="container mx-auto px-4 sm:px-6 lg:px-10 py-6">
        <!-- Header -->
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-6">
            <h1 class="text-2xl font-bold text-themecolor">Latest Discussions</h1>
            @auth
            @if(Auth::user()->role === 'user' || Auth::user()->role === 'admin')
            <button class="flex items-center gap-2 bg-themecolor hover:bg-secondarycolor text-white px-4 py-2 rounded-lg font-medium w-full sm:w-auto justify-center">
                + New Discussion
            </button>
            @endif
            @endauth
        </div>

        <!-- Grid Layout -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

            <!-- Discussions Column -->
            <div class="lg:col-span-2 space-y-4">
                <!-- Discussion Card 1 -->
                <div class="bg-white shadow rounded-xl p-5">
                    <a href="">
                        <h2 class="font-bold text-xl text-gray-900">
                            Welcome to our new forum! Let's discuss the best asdasjhdaskdakljsdklas...
                        </h2>
                        <p class="text-gray-600 mt-2 text-sm">
                            I'm excited to start this community and would love to hear your thoughts...
                        </p>
                    </a>

                    <div class="flex justify-between items-center mt-4 text-gray-500 text-sm">
                        <div class="flex items-center gap-2">
                            <img src="https://i.pravatar.cc/40?img=1" class="w-6 h-6 rounded-full">
                            <div>
                                <p class="font-semibold text-gray-800">admin @ <span class="text-xs text-gray-500"> 5 mins ago</span></p>
                            </div>
                        </div>
                        <div class="flex items-center gap-4">
                            <span class="flex items-center gap-1">👍 45</span>
                            <span class="flex items-center gap-1">💬 23</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Sidebar -->
            <aside class="space-y-6">
                <!-- Trending -->
                <div class="bg-white shadow rounded-xl p-5">
                    <h2 class="font-bold text-gray-800 mb-4">🔥 Trending This Week</h2>
                    <ol class="space-y-3 text-sm text-gray-700">
                        <li class="flex justify-between">
                            <span><span class="text-orange-500 font-bold">1.</span> AI in software</span>
                            <span class="text-gray-500">💬 89</span>
                        </li>
                        <li class="flex justify-between">
                            <span><span class="text-orange-500 font-bold">2.</span> Remote work tips</span>
                            <span class="text-gray-500">💬 67</span>
                        </li>
                        <li class="flex justify-between">
                            <span><span class="text-orange-500 font-bold">3.</span> Code reviews</span>
                            <span class="text-gray-500">💬 45</span>
                        </li>
                        <li class="flex justify-between">
                            <span><span class="text-orange-500 font-bold">4.</span> Career advice</span>
                            <span class="text-gray-500">💬 34</span>
                        </li>
                    </ol>
                </div>

                <!-- Active Users -->
                <div class="bg-white shadow rounded-xl p-5">
                    <h2 class="font-bold text-gray-800 mb-4">👥 Most Active Users</h2>
                    <ul class="space-y-2 text-sm text-gray-700">
                        <li class="flex justify-between">
                            <span class="flex items-center gap-2"><span class="text-blue-600 font-bold">1.</span> developer123</span>
                            <span class="text-gray-500">45 posts</span>
                        </li>
                        <li class="flex justify-between">
                            <span class="flex items-center gap-2"><span class="text-blue-600 font-bold">2.</span> productivityguru</span>
                            <span class="text-gray-500">32 posts</span>
                        </li>
                        <li class="flex justify-between">
                            <span class="flex items-center gap-2"><span class="text-blue-600 font-bold">3.</span> codemaster</span>
                            <span class="text-gray-500">28 posts</span>
                        </li>
                        <li class="flex justify-between">
                            <span class="flex items-center gap-2"><span class="text-blue-600 font-bold">4.</span> techexplorer</span>
                            <span class="text-gray-500">24 posts</span>
                        </li>
                    </ul>
                </div>
            </aside>
        </div>
    </div>
</div>
