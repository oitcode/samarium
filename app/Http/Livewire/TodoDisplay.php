<?php

namespace App\Http\Livewire;

use Livewire\Component;

class TodoDisplay extends Component
{
    public $todo;

    public function render()
    {
        return view('livewire.todo-display');
    }
}
