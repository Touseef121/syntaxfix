<?php

namespace App\Livewire\Forum;

use App\Models\Forum;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        $forums = Forum::all();
        return view('livewire.forum.index', ['forums' => $forums]);
    }
}
