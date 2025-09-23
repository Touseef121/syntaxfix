<?php

namespace App\Livewire;

use Livewire\Attributes\Modelable;
use Livewire\Component;

class Select2Dropdown extends Component
{
    #[Modelable]

    public $value = null; // selected value
    public $options = [];
    public $name;
    public $placeholder = "Select an option";
    public bool $disabled = false;
    public $model; // property name in parent

    public function mount($name, $options = [], $model = null, $value = null, $placeholder = null)
    {
        $this->options = $options;
        $this->model = $model;
        $this->value = $value;
        $this->name = $name;

        if ($placeholder) {
            $this->placeholder = $placeholder;
        }
    }

    public function updatedValue($value)
    {
        $this->dispatch('select2Changed', $this->model, $value);
    }


    public function render()
    {
        return view('livewire.select2-dropdown');
    }
}
