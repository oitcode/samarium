<?php

namespace App\Http\Livewire;

use App\Traits\ModesTrait;

use Livewire\Component;

use App\Todo;

class TodoComponent extends Component
{
    use ModesTrait;

    public $updatingTodo = null;
    public $deletingTodo = null;

    public $modes = [
        'createMode' => false,
        'updateMode' => false,
        'deleteMode' => false,
    ];

    protected $listeners = [
        'todoAdded' => 'finishCreate',
        'exitCreate' => 'exitCreateMode',
        'updateTodo',
        'exitUpdate' => 'exitUpdateMode',
        'deleteTodo',
        'confirmDeleteTodo',
        'exitDelete' => 'exitDeleteMode',
    ];

    public function render()
    {
        return view('livewire.todo-component');
    }

    public function updateTodo(Todo $todo)
    {
        $this->updatingTodo = $todo;
        $this->enterMode('updateMode');
    }

    public function deleteTodo(Todo $todo)
    {
        $todo->delete();
        $this->exitMode('deleteMode');
        $this->emit('updateList');
    }

    public function confirmDeleteTodo(Todo $todo)
    {
        $this->enterMode('deleteMode');
        $this->deletingTodo = $todo;
    }

    public function finishCreate()
    {
        $this->exitMode('createMode');
        $this->emit('updateList');
    }
}
