<div>
    <div>
        @if(session()->has('success'))
        <x-alert type="success" :message="session('success')" />
        @endif

        @if(session()->has('error'))
        <x-alert type="error" :message="session('error')" />
        @endif
    </div>
    <div class="my-2 shadow bg-white rounded-md">

        <form action="" class="grid grid-cols-1 md:grid-cols-2 gap-4 p-4">
            <!-- Title (full width on mobile, half on desktop) -->
            <div class="flex flex-col col-span-1 md:col-span-2">
                <label for="title" class="block text-gray-700 font-bold mb-1">Title <span class="text-red-600">*</span></label>
                <input data-slot="input" wire:model="forum.title" class="file:text-foreground placeholder:text-muted-foreground selection:bg-maincolor selection:text-primary-foreground border-gray-300 flex h-9 w-full min-w-0 rounded-md border bg-transparent px-3 py-1 shadow-xs md:text-sm focus-visible:border-ring focus-visible:ring-themecolor focus-visible:ring-1 text-lg" id="title" placeholder="What's your discussion about?" required="" value="">
                @error('forum.title')
                <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
                <p class="text-sm text-gray-500">Be specific and descriptive to help others find your discussion.</p>
            </div>

            <div class="flex flex-col">
                <label for="category" class="block text-gray-700 font-medium mb-1">Category <span class="text-red-600">*</span></label>
                <livewire:select2-dropdown name="Category" :options="$categories" model="category" :value="$categories" placeholder="Select Category" wire:key="category-dropdown" />
                @error('forum.category')
                <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>


            <div class="flex flex-col">
                <label for="sub_category" class="block text-gray-700 font-medium mb-1">Sub Category <span class="text-red-600">*</span></label>
                <livewire:select2-dropdown :options="$subCategories" name="subCategory" model="subCategory" :value="$subCategories" placeholder="Select Subcategory" />
                @error('forum.subCategory')
                <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Content (full width) -->
            <div class="flex flex-col col-span-1 md:col-span-2">
                <label for="content" class="block text-gray-700 font-medium mb-1">Description <span class="text-red-600">*</span></label>
                <textarea id="content" wire:model="forum.description" name="content" rows="10" placeholder="Write your discussion here" class="block w-full rounded-md border-gray-300 shadow-sm focus:ring-themecolor focus:border-themecolor"></textarea>
                @error('forum.description')
                <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
                <p class="text-sm text-gray-500">You can use markdown formatting. Be clear and provide context for better discussions.</p>
            </div>

            <!-- Attachment -->
            <div class="flex flex-col md:col-span-2">
                <label for="attachment" class="block text-gray-700 font-medium mb-1">Attachment</label>

                <label class="relative flex items-center justify-center px-4 py-2 bg-white border border-gray-300 rounded-md shadow-sm text-gray-700 cursor-pointer hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-themecolor">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-2 text-gray-400">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5m-13.5-9L12 3m0 0 4.5 4.5M12 3v13.5" />
                    </svg>
                    <span class="text-sm">Choose a file</span>
                    <input type="file" wire:model="uploadedFiles" multiple id="attachment" name="attachment[]" class="hidden" />

                    <!-- Spinner -->
                    <div wire:loading wire:target="uploadedFiles" class="absolute right-2 top-1/2 transform -translate-y-1/2">
                        <svg class="animate-spin h-5 w-5 text-themecolor" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v4a4 4 0 00-4 4H4z"></path>
                        </svg>
                    </div>
                </label>

                @error('uploadedFiles')
                <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror

                <!-- Uploaded files grid -->
                @if(!empty($uploaded_files))
                <div class="mt-2 grid grid-cols-3 md:grid-cols-6 gap-4">
                    @foreach($uploaded_files as $index => $file)
                    <div class="relative group border border-gray-200 rounded-md overflow-hidden bg-gray-50">
                        <!-- Remove button at top-right -->
                        <button type="button" wire:click.prevent="removeTempFile({{ $index }})" class="absolute top-1 right-1 bg-white rounded-full w-6 h-6 flex items-center justify-center text-themecolor hover:text-red-800 shadow-md z-10 opacity-0 group-hover:opacity-100 transition">
                            &times;
                        </button>

                        <!-- Preview -->
                        @if(in_array(strtolower(pathinfo($file['filename'], PATHINFO_EXTENSION)), ['jpg','jpeg','png','gif','bmp','webp']))
                        <img src="{{ asset('storage/' . $file['file_path']) }}" class="w-full h-24 object-cover" alt="preview">
                        @elseif(strtolower(pathinfo($file['filename'], PATHINFO_EXTENSION)) === 'pdf')
                        <div class="flex items-center justify-center w-full h-24 bg-red-100 text-red-500">
                            <svg class="w-12 h-12" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M6 2h9l5 5v15a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2z" />
                            </svg>
                        </div>
                        @else
                        <div class="flex items-center justify-center w-full h-24 bg-gray-100 text-gray-500">
                            <svg class="w-12 h-12" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M6 2h9l5 5v15a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2z" />
                            </svg>
                        </div>
                        @endif

                        <!-- Filename -->
                        <div class="px-1 py-1 text-xs text-center truncate bg-white">
                            {{ $file['filename'] }}
                        </div>
                    </div>
                    @endforeach
                </div>
                @endif
            </div>

            <!-- Submit Button (full width, right-aligned) -->
            <div class="col-span-1 md:col-span-2 text-right">
                <button type="button" wire:click="save" class="px-4 py-2 bg-themecolor text-white rounded-md hover:bg-secondarycolor focus:outline-none focus:ring-1 focus:ring-themecolor">
                    Create Post
                </button>
            </div>
        </form>
    </div>
</div>
