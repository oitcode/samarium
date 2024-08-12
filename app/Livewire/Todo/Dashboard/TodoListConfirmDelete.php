<?php

namespace App\Livewire\Todo\Dashboard;

use Livewire\Component;

class TodoListConfirmDelete extends Component
{
    public $todo;

    public function render()
    {
        return view('livewire.todo.dashboard.todo-list-confirm-delete');
    }
}
