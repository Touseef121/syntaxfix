<div>
    <div class="bg-gray-200 rounded-lg p-1 grid grid-cols-2 sm:grid-cols-4 gap-1 mb-6">

        <button wire:click="setTab('profile')" class="text-sm sm:text-base py-2 px-2 rounded-md w-full text-center transition
        {{ $activeTab === 'profile' ? 'bg-white shadow-sm text-themecolor font-semibold' : 'text-gray-500 hover:bg-gray-100' }}">
            Profile
        </button>

        <button wire:click="setTab('notifications')" class="text-sm sm:text-base py-2 px-2 rounded-md w-full text-center transition
        {{ $activeTab === 'notifications' ? 'bg-white shadow-sm text-themecolor font-semibold' : 'text-gray-500 hover:bg-gray-100' }}">
            Notifications
        </button>

        <button wire:click="setTab('privacy')" class="text-sm sm:text-base py-2 px-2 rounded-md w-full text-center transition
        {{ $activeTab === 'privacy' ? 'bg-white shadow-sm text-themecolor font-semibold' : 'text-gray-500 hover:bg-gray-100' }}">
            Privacy
        </button>

        <button wire:click="setTab('account')" class="text-sm sm:text-base py-2 px-2 rounded-md w-full text-center transition
        {{ $activeTab === 'account' ? 'bg-white shadow-sm text-themecolor font-semibold' : 'text-gray-500 hover:bg-gray-100' }}">
            Account
        </button>

    </div>

    <!-- Tab Content -->
    <div class="space-y-6">
        @if($activeTab === 'profile')
        @livewire('forum.user.edit-profile', ['id' => $id])
        @elseif($activeTab === 'notifications')
        {{-- @livewire('forum.user.notifications') --}}
        @elseif($activeTab === 'privacy')
        {{-- @livewire('forum.user.privacy') --}}
        @elseif($activeTab === 'account')
        {{-- @livewire('forum.user.account') --}}
        @endif
    </div>
</div>
