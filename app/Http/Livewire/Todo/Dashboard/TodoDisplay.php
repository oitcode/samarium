<?php

namespace App\Http\Livewire\Todo\Dashboard;

use Livewire\Component;

use App\Traits\ModesTrait;

class TodoDisplay extends Component
{
    use ModesTrait;

    public $todo;

    public $title;
    public $todo_status;

    public $modes = [
        'updateTitleMode' => false,
        'updateDescriptionMode' => false,
        'updateStatusMode' => false,
    ];

    protected $listeners = [
        'todoUpdateTitleCancelled',
        'todoUpdateTitleCompleted',

        'todoUpdateDescriptionCancelled',
        'todoUpdateDescriptionCompleted',

        'todoUpdateStatusCancelled',
        'todoUpdateStatusCompleted',
    ];

    public function mount()
    {
        $this->todo_status = $this->todo->status;
        $this->title = $this->todo->title;
    }

    public function render()
    {
        return view('livewire.todo.dashboard.todo-display');
    }

    public function changeStatus()
    {
        /* Todo: Validation */

        $this->todo->status = $this->todo_status;
        $this->todo->save();
        $this->todo = $this->todo->fresh();
        $this->exitMode('updateStatus');

        session()->flash('message', 'Status updated');
    }

    public function updateTitle()
    {
        /* Todo: Validation */

        $this->todo->title = $this->title;
        $this->todo->save();
        $this->todo = $this->todo->fresh();
        $this->exitMode('updateTitleMode');

        session()->flash('message', 'Title updated');
    }

    public function todoUpdateTitleCancelled()
    {
        $this->exitMode('updateTitleMode');
    }

    public function todoUpdateTitleCompleted()
    {
        $this->exitMode('updateTitleMode');
    }

    public function todoUpdateDescriptionCancelled()
    {
        $this->exitMode('updateDescriptionMode');
    }

    public function todoUpdateDescriptionCompleted()
    {
        $this->exitMode('updateDescriptionMode');
    }

    public function todoUpdateStatusCancelled()
    {
        $this->exitMode('updateStatusMode');
    }

    public function todoUpdateStatusCompleted()
    {
        $this->exitMode('updateStatusMode');
    }
}
