<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <div class="max-w-8xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 items-center">

            <!-- 1️⃣ Left: Logo -->
            <div class="flex-shrink-0 flex items-center">
                <a href="{{ route('home') }}">
                    <x-application-logo class="h-8 w-auto max-w-full" />
                </a>
            </div>

            <!-- 2️⃣ Center: Navigation Links -->
            <div class="hidden sm:flex flex-1 justify-center px-2 max-w-xs w-full">
                <x-search-bar />
            </div>

            <!-- 3️⃣ Right: Login / Sign Up Buttons -->
            <div class="hidden sm:flex items-center space-x-3">
                @guest
                <a href="{{ route('login') }}" class="text-white bg-themecolor px-3 py-1 rounded-md border border-transparent hover:border-themecolor hover:ring-1 hover:ring-themecolor hover:bg-white hover:text-themecolor transition">
                    {{ __('Log In') }}
                </a>
                <a href="{{ route('register') }}" class="px-3 py-1 rounded-md border border-themecolor ring-1 ring-themecolor bg-white text-themecolor hover:text-white hover:bg-themecolor hover:ring-0 transition">
                    {{ __('Sign Up') }}
                </a>
                @endguest
            </div>

            {{-- hamburger --}}
            <div class="flex sm:hidden flex-shrink-0">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-500 hover:text-gray-700 hover:bg-gray-100 transition">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <!-- Settings Dropdown -->
            @auth
            <div class="hidden sm:flex sm:items-center sm:ms-6">

                {{-- Ring Icon --}}
                <button data-slot="dropdown-menu-trigger" class="inline-flex items-center justify-center whitespace-nowrap text-sm font-medium transition-all disabled:pointer-events-none disabled:opacity-50 [&amp;_svg]:pointer-events-none [&amp;_svg:not([class*='size-'])]:size-4 shrink-0 [&amp;_svg]:shrink-0 outline-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20  aria-invalid:border-destructive hover:bg-accent hover:text-accent-foreground  h-8 rounded-md gap-1.5 px-3 has-[&gt;svg]:px-2.5 relative" type="button" id="radix-_r_0_" aria-haspopup="menu" aria-expanded="false" data-state="closed">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-themecolor w-5 h-5">
                        <path d="M6 8a6 6 0 0 1 12 0c0 7 3 9 3 9H3s3-2 3-9"></path>
                        <path d="M10.3 21a1.94 1.94 0 0 0 3.4 0"></path>
                    </svg>
                    <span data-slot="badge" class="rounded-md border font-medium whitespace-nowrap shrink-0 [&amp;&gt;svg]:size-3 gap-1 [&amp;&gt;svg]:pointer-events-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20  aria-invalid:border-destructive transition-[color,box-shadow] overflow-hidden border-transparent text-primary-foreground [a&amp;]:hover:bg-primary/90 absolute -top-1 -right-1 h-5 w-5 flex items-center justify-center p-0 bg-[#F59E0B] text-xs">2</span>
                </button>

                {{-- Inbox Message --}}
                <button data-slot="button" class="inline-flex items-center justify-center whitespace-nowrap text-sm font-medium transition-all disabled:pointer-events-none disabled:opacity-50 [&amp;_svg]:pointer-events-none [&amp;_svg:not([class*='size-'])]:size-4 shrink-0 [&amp;_svg]:shrink-0 outline-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20  aria-invalid:border-destructive hover:bg-accent hover:text-accent-foreground  h-8 rounded-md gap-1.5 px-3 has-[&gt;svg]:px-2.5">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-themecolor w-5 h-5">
                        <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
                    </svg>
                </button>

                {{-- Profile Icon --}}
                <x-dropdown align="right" width="56">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500  bg-white  hover:text-gray-700  focus:outline-none transition ease-in-out duration-150">
                            <span data-slot="avatar" class="relative flex size-8 shrink-0 overflow-hidden rounded-full h-8 w-8">
                                <img data-slot="avatar-image" class="aspect-square size-full" alt="johndoe" src="https://hebbkx1anhila5yf.public.blob.vercel-storage.com/attachments/gen-images/public/diverse-user-avatars-jNaliJbW5b5ccprrlYjj99XE0SOY9L.png">
                            </span>
                        </button>
                    </x-slot>


                    <x-slot name="content">
                        <x-dropdown-link :href="route('user.profile',Auth::user()->id)" class="flex items-center gap-x-3">
                            <!-- SVG Icon -->
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                            </svg>

                            <!-- Link Text -->
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <x-dropdown-link :href="route('user.profile',Auth::user()->id)" class="flex items-center gap-x-3">
                            <!-- SVG Icon -->
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M10.343 3.94c.09-.542.56-.94 1.11-.94h1.093c.55 0 1.02.398 1.11.94l.149.894c.07.424.384.764.78.93.398.164.855.142 1.205-.108l.737-.527a1.125 1.125 0 0 1 1.45.12l.773.774c.39.389.44 1.002.12 1.45l-.527.737c-.25.35-.272.806-.107 1.204.165.397.505.71.93.78l.893.15c.543.09.94.559.94 1.109v1.094c0 .55-.397 1.02-.94 1.11l-.894.149c-.424.07-.764.383-.929.78-.165.398-.143.854.107 1.204l.527.738c.32.447.269 1.06-.12 1.45l-.774.773a1.125 1.125 0 0 1-1.449.12l-.738-.527c-.35-.25-.806-.272-1.203-.107-.398.165-.71.505-.781.929l-.149.894c-.09.542-.56.94-1.11.94h-1.094c-.55 0-1.019-.398-1.11-.94l-.148-.894c-.071-.424-.384-.764-.781-.93-.398-.164-.854-.142-1.204.108l-.738.527c-.447.32-1.06.269-1.45-.12l-.773-.774a1.125 1.125 0 0 1-.12-1.45l.527-.737c.25-.35.272-.806.108-1.204-.165-.397-.506-.71-.93-.78l-.894-.15c-.542-.09-.94-.56-.94-1.109v-1.094c0-.55.398-1.02.94-1.11l.894-.149c.424-.07.765-.383.93-.78.165-.398.143-.854-.108-1.204l-.526-.738a1.125 1.125 0 0 1 .12-1.45l.773-.773a1.125 1.125 0 0 1 1.45-.12l.737.527c.35.25.807.272 1.204.107.397-.165.71-.505.78-.929l.15-.894Z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                            </svg>

                            <!-- Link Text -->
                            {{ __('Settings') }}
                        </x-dropdown-link>


                        <hr class="bg-gray-200 my-2">

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link class="flex itens-center gap-x-3" :href="route('logout')" onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-6a2.25 2.25 0 0 0-2.25 2.25v13.5A2.25 2.25 0 0 0 7.5 21h6a2.25 2.25 0 0 0 2.25-2.25V15m3 0 3-3m0 0-3-3m3 3H9" />
                                </svg>

                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>
            @endauth
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <!-- ✅ Mobile Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="px-4 pt-4 pb-3 space-y-4">

            <!-- 🔍 Search on mobile -->
            <div class="w-full max-w-full overflow-hidden">
                <x-search-bar />
            </div>

            <!-- 🔑 Guest Links -->
            @guest
            <div class="space-y-2">
                <a href="{{ route('login') }}" class="block w-full text-center text-white bg-themecolor px-3 py-2 rounded-md border border-transparent hover:border-themecolor hover:ring-1 hover:ring-themecolor hover:bg-white hover:text-themecolor transition">
                    {{ __('Log In') }}
                </a>
                <a href="{{ route('register') }}" class="block w-full text-center px-3 py-2 rounded-md border border-themecolor ring-1 ring-themecolor bg-white text-themecolor hover:text-white hover:bg-themecolor hover:ring-0 transition">
                    {{ __('Sign Up') }}
                </a>
            </div>
            @endguest

            <!-- 👤 Authenticated User -->
            @auth
            <div class="pt-4 border-t border-gray-200">
                <div class="px-2">
                    <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                </div>

                <div class="mt-3 space-y-2">
                    <x-responsive-nav-link :href="route('user.profile',Auth::user()->id)">
                        {{ __('Profile') }}
                    </x-responsive-nav-link>

                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <x-responsive-nav-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </x-responsive-nav-link>
                    </form>
                </div>
            </div>
            @endauth
        </div>
    </div>


</nav>
