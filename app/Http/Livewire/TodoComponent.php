<?php

namespace App\Http\Livewire;

use App\Traits\ModesTrait;

use Livewire\Component;

use App\Todo;

class TodoComponent extends Component
{
    use ModesTrait;

    public $displayingTodo = null;
    public $updatingTodo = null;
    public $deletingTodo = null;

    public $modes = [
        'createMode' => false,
        'updateMode' => false,
        'deleteMode' => false,
        'listMode' => true,
        'displayMode' => false,
    ];

    protected $listeners = [
        'todoAdded' => 'finishCreate',
        'todoCreated' => 'finishCreate',
        'exitCreateMode',
        'updateTodo',
        'exitUpdate' => 'exitUpdateMode',
        'deleteTodo',
        'confirmDeleteTodo',
        'exitDelete' => 'exitDeleteMode',
        'displayTodo',
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
        session()->flash('message', 'Todo created');
        $this->exitMode('createMode');
        $this->emit('updateList');
    }

    public function exitCreateMode()
    {
        $this->exitMode('createMode');
    }

    public function displayTodo(Todo $todo)
    {
        $this->displayingTodo = $todo;
        $this->enterMode('displayMode');
    }
}
