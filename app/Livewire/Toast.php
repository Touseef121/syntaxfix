<?php

namespace App\Livewire;

use Livewire\Component;

class Toast extends Component
{
    public $message;
    public $type; // success | error | info

    protected $listeners = ['showToast' => 'show'];

    public function mount()
    {
        if (session()->has('success')) {
            $this->message = session('success');
            $this->type = 'success';
        } elseif (session()->has('error')) {
            $this->message = session('error');
            $this->type = 'error';
        }
    }

    public function show($message, $type = 'success')
    {
        $this->message = $message;
        $this->type = $type;
    }

    public function render()
    {
        return view('livewire.toast');
    }
}
