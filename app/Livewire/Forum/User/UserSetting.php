<?php

namespace App\Livewire\Forum\User;

use Livewire\Component;

class UserSetting extends Component
{
    public $activeTab = 'profile'; // default tab
    public $id;

    public function mount($id)
    {
        $this->id = $id;
    }

    public function setTab($tab)
    {
        $this->activeTab = $tab;
    }
    
    public function render()
    {
        return view('livewire.forum.user.user-setting');
    }
}
