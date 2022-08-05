<?php

namespace App\Http\Livewire;

use Livewire\Component;

class TodoListConfirmDelete extends Component
{
    public $todo;

    public function render()
    {
        return view('livewire.todo-list-confirm-delete');
    }
}
