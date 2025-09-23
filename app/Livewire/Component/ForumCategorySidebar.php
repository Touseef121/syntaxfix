<?php

namespace App\Livewire\Component;

use App\Models\User;
use App\Models\Forum;
use Livewire\Component;
use App\Models\Category;

class ForumCategorySidebar extends Component
{
    public $activeCategory = null;
    public $categories;
    public $totalThreads;
    public $activeUsers;
    public $onlineNow;

    public function mount()
    {
        $this->loadStats();
    }
    
    public function loadStats()
    {
        // Categories with forum counts
        $this->categories = Category::withCount('forums')->get();

        // Quick stats
        $this->totalThreads = Forum::count();
        $this->activeUsers = User::has('forums')->count();
        $this->onlineNow = User::where('last_activity', '>=', now()->subMinutes(5))->count();; // Replace with real online logic if available
    }

    public function setCategory($categoryId)
    {
        $this->activeCategory = $categoryId;
        $this->loadStats();
        $this->dispatch('categorySelected', $categoryId);
    }


    public function render()
    {
        return view('livewire.component.forum-category-sidebar');
    }
}
