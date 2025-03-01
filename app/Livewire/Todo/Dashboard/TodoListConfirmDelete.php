<?php

namespace App\Livewire\Todo\Dashboard;

use Livewire\Component;
use Illuminate\View\View;

class TodoListConfirmDelete extends Component
{
    public $todo;

    public function render(): View
    {
        return view('livewire.todo.dashboard.todo-list-confirm-delete');
    }
}
