<?php

namespace App\Http\Livewire\Todo\Dashboard;

use Livewire\Component;

use App\Todo;

class TodoGlance extends Component
{
    public $totalTodo;
    public $todos;

    public function render()
    {
        $this->totalTodo = Todo::count();
        $this->todos = Todo::orderBy('todo_id', 'desc')->limit(5)->get();

        return view('livewire.todo.dashboard.todo-glance');
    }
}
