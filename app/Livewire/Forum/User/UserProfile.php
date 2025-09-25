<?php

namespace App\Livewire\Forum\User;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UserProfile extends Component
{
    public $activeTab = 'posts'; // default

    public $user;

    public function mount($id)
    {
        $this->user = User::findOrFail($id);
    }

    public function setTab($tab)
    {
        $this->activeTab = $tab;
    }

    public function render()
    {
        $posts = $this->user->forums()->withCount(['comments', 'likes'])->latest()->paginate(5);
        $replies = $this->user->comments()->with('forum')->latest()->paginate(5);
        $likes = $this->user->likedForums()->latest()->paginate(5);
        $saved = $this->user->savedForums()->latest()->paginate(5);
        $activity = $this->user->activities()->latest()->paginate(5);

        return view('livewire.forum.user.user-profile', [
            'posts'    => $posts,
            'replies'  => $replies,
            'saved'    => $saved,
            'likes'    => $likes,
            'activity' => $activity,
        ]);
    }
}
