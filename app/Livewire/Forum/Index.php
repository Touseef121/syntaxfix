<?php

namespace App\Livewire\Forum;

use App\Models\User;
use App\Models\Forum;
use Livewire\Component;
use App\Models\Category;
use App\Models\ForumLike;
use Illuminate\Support\Facades\Auth;

class Index extends Component
{
    public $forums;
    public $trendingCategories;
    public $activeCategory = null;
    public $activeUsers;
    public $mostLikedPosts;
    protected $listeners = ['categorySelected' => 'filterByCategory'];

    public function filterByCategory($categoryId)
    {
        $this->activeCategory = $categoryId; // Track the current category
        $this->loadData(); // Reload all relevant data
    }


    public function mount()
    {
        $this->loadData();
    }

    public function loadData()
    {
        // Load forums (all or by active category)
        $query = Forum::with(['likes', 'user']);
        if ($this->activeCategory) {
            $query->where('category_id', $this->activeCategory);
        }
        $this->forums = $query->latest()->get();

        // Trending categories
        $this->trendingCategories = Category::withCount('forums')
            ->having('forums_count', '>', 0)
            ->orderByDesc('forums_count')
            ->take(5)
            ->get();

        // Active users
        $this->activeUsers = User::withCount('forums')
            ->having('forums_count', '>', 0)
            ->orderByDesc('forums_count')
            ->take(5)
            ->get();

        // Most liked posts
        $this->mostLikedPosts = Forum::withCount('likes')
            ->orderByDesc('likes_count')
            ->take(5)
            ->get();
    }


    public function toggleLike($forumId)
    {
        if (!Auth::check()) return;

        $like = ForumLike::where('forum_id', $forumId)
            ->where('user_id', Auth::user()->id)
            ->first();

        if ($like) {
            $like->delete();
        } else {
            ForumLike::create([
                'forum_id' => $forumId,
                'user_id' => Auth::user()->id,
            ]);
        }

        $this->loadData(); // Reload forums + stats to reflect like counts
    }


    public function render()
    {
        return view('livewire.forum.index');
    }
}
