<div>
    <div class="bg-white p-5 text-card-foreground flex flex-col rounded-xl shadow-sm">

        <!-- Card Header -->
        <div class="grid auto-rows-min grid-rows-[auto_auto] items-start gap-1.5 px-6">
            <div class="font-semibold text-xl text-themecolor">Profile Information</div>
        </div>

        <!-- Card Content -->
        <div class="px-6">
            <form class="space-y-6">

                <div class="flex flex-col sm:flex-row items-center sm:items-start gap-4">
                    <!-- Avatar Preview -->
                    <span class="relative flex h-20 w-20 shrink-0 overflow-hidden rounded-full border">
                        @if($avatar)
                        <img class="w-full h-full object-cover" src="{{ $avatar->temporaryUrl() }}" alt="New Avatar Preview">
                        @elseif($currentAvatar)
                        <img class="w-full h-full object-cover" src="{{ asset('storage/' . $currentAvatar->file_path) }}" alt="User Avatar">
                        @else
                        <img class="w-full h-full object-cover" src="{{ asset('images/default-image.png') }}" alt="Default Avatar">
                        @endif
                    </span>

                    <!-- Upload & Actions -->
                    <div class="flex flex-col gap-2 mt-2">
                        <div class="flex flex-col sm:flex-row items-center gap-2">
                            <!-- Upload / Change Avatar Button -->
                            <label for="avatar" class="inline-flex items-center justify-center gap-2 h-9 px-4 py-2 text-sm font-medium rounded-md bg-transparent text-themecolor border cursor-pointer hover:bg-themecolor hover:text-white transition">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5m-13.5-9L12 3m0 0 4.5 4.5M12 3v13.5" />
                                </svg>
                                {{ $avatar ? 'Change Avatar' : 'Upload Avatar' }}
                            </label>
                            <input id="avatar" type="file" wire:model="avatar" accept="image/*" class="hidden">

                            <!-- 🔄 Loader during file upload -->
                            <div wire:loading wire:target="avatar" class="ml-2">
                                <svg class="animate-spin h-5 w-5 text-themecolor" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v4a4 4 0 00-4 4H4z"></path>
                                </svg>
                            </div>

                            <!-- Remove Button (only if current avatar exists and no new one pending) -->
                            @if($currentAvatar)
                            <button wire:click="confirmRemove" type="button" class="inline-flex items-center gap-2 h-9 px-4 py-2 text-sm rounded-md border text-red-600 hover:bg-red-600 hover:text-white transition" wire:loading.attr="disabled" wire:target="confirmRemove">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" class="h-5 w-5" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                </svg>
                                Remove
                            </button>
                            @endif
                        </div>

                        <p class="text-sm text-gray-500">JPG, PNG. Max size 2MB.</p>
                    </div>

                </div>


                <!-- Username & Email -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="space-y-2">
                        <label class="text-sm font-medium" for="username">Username</label>
                        <input id="username" required wire:model="user.name" class="border-input w-full h-9 rounded-md border bg-transparent px-3 py-1 text-base shadow-xs focus-visible:ring-2 focus-visible:ring-ring">
                        @error('user.name')
                        <p class="text-red-700">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>

                    <div class="space-y-2">
                        <label class="text-sm font-medium" for="email">Email</label>
                        <input id="email" type="email" wire:model="user.email" required class="border-input w-full h-9 rounded-md border bg-transparent px-3 py-1 text-base shadow-xs focus-visible:ring-2 focus-visible:ring-ring">
                        @error('user.email')
                        <p class="text-red-700">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>
                </div>

                <!-- Bio -->
                <div class="space-y-2">
                    <label class="text-sm font-medium" for="bio">Bio</label>
                    <textarea id="bio" wire:model="user.bio" placeholder="Tell us about yourself..." class="border-input w-full min-h-[100px] rounded-md border bg-transparent px-3 py-2 text-base shadow-xs focus-visible:ring-2 focus-visible:ring-ring"></textarea>
                    @error('user.bio')
                    <p class="text-red-700">
                        {{ $message }}
                    </p>
                    @enderror
                </div>

                <!-- Location & Website -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="space-y-2">
                        <label class="text-sm font-medium" for="location">Location</label>
                        <input id="location" placeholder="City, Country" wire:model="user.location" value="San Francisco, CA" class="border-input w-full h-9 rounded-md border bg-transparent px-3 py-1 text-base shadow-xs focus-visible:ring-2 focus-visible:ring-ring">
                        @error('user.location')
                        <p class="text-red-700">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>

                    <div class="space-y-2">
                        <label class="text-sm font-medium" for="website">Website</label>
                        <input id="website" placeholder="https://yourwebsite.com" wire:model="user.website" value="https://johndoe.dev" class="border-input w-full h-9 rounded-md border bg-transparent px-3 py-1 text-base shadow-xs focus-visible:ring-2 focus-visible:ring-ring">
                        @error('user.website')
                        <p class="text-red-700">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>
                </div>

                <!-- Submit Button -->
                <!-- Submit Button -->
                <button wire:click.prevent="save" type="button" class="inline-flex items-center justify-center gap-2 h-9 px-4 py-2 text-sm font-medium rounded-md bg-themecolor text-white shadow-xs hover:bg-secondarycolor focus-visible:ring-2 focus-visible:ring-ring" wire:loading.attr="disabled" wire:target="save,avatar">
                    Save Changes
                    <!-- Loader -->
                    <svg wire:loading wire:target="save" class="animate-spin h-4 w-4 text-white ml-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v4a4 4 0 00-4 4H4z"></path>
                    </svg>
                </button>

            </form>
        </div>
    </div>

    <!-- Remove Confirmation Modal -->
    @if($showRemoveModal)
    <div class="fixed inset-0 bg-black/50 flex items-center justify-center z-50">
        <div class="bg-white rounded-lg shadow-lg p-6 max-w-sm w-full">
            <h2 class="text-lg font-semibold text-gray-800 mb-4">Confirm Removal</h2>
            <p class="text-sm text-gray-600 mb-6">Are you sure you want to remove your profile picture? A default avatar will be shown instead.</p>

            <div class="flex justify-end gap-3">
                <button wire:click="$set('showRemoveModal', false)" class="px-4 py-2 text-sm rounded-md border">
                    Cancel
                </button>
                <button wire:click="removeAvatar" class="px-4 py-2 text-sm rounded-md bg-red-600 text-white hover:bg-red-700">
                    Remove
                </button>
            </div>
        </div>
    </div>
    @endif


</div>
