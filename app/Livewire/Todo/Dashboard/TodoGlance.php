<?php

namespace App\Livewire\Todo\Dashboard;

use Livewire\Component;
use Illuminate\View\View;
use App\Models\Todo\Todo;

class TodoGlance extends Component
{
    public $totalTodo;
    public $todos;

    public function render(): View
    {
        $this->totalTodo = Todo::count();
        $this->todos = Todo::orderBy('todo_id', 'desc')->limit(5)->get();

        return view('livewire.todo.dashboard.todo-glance');
    }
}
