<?php

namespace App\Livewire\Todo\Dashboard;

use App\Traits\ModesTrait;
use Illuminate\View\View;
use Livewire\Component;
use App\Models\Todo\Todo;

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
        'exitTodoDisplay',
    ];

    public function render(): View
    {
        return view('livewire.todo.dashboard.todo-component');
    }

    public function updateTodo(Todo $todo): void
    {
        $this->updatingTodo = $todo;
        $this->enterMode('updateMode');
    }

    public function deleteTodo(Todo $todo): void
    {
        $todo->delete();
        $this->exitMode('deleteMode');
        $this->dispatch('updateList');
    }

    public function confirmDeleteTodo(Todo $todo): void
    {
        $this->enterMode('deleteMode');
        $this->deletingTodo = $todo;
    }

    public function finishCreate(): void
    {
        session()->flash('message', 'Todo created');
        $this->exitMode('createMode');
        $this->dispatch('updateList');
    }

    public function exitCreateMode(): void
    {
        $this->exitMode('createMode');
    }

    public function displayTodo(int $todoId): void
    {
        $this->displayingTodo = Todo::find($todoId);
        $this->enterMode('displayMode');
    }

    public function exitTodoDisplay(): void
    {
        $this->displayingTodo = null;
        $this->exitMode('displayMode');
    }
}
