<?php

namespace App\Livewire\Todo\Dashboard;

use Livewire\Component;
use Illuminate\View\View;
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
        'updatePriorityMode' => false,
        'updateDueDateMode' => false,
        'updateAssignedToMode' => false,
        'updateStatusMode' => false,
        'deleteMode' => false,
    ];

    protected $listeners = [
        'todoUpdateTitleCancelled',
        'todoUpdateTitleCompleted',

        'todoUpdateDescriptionCancelled',
        'todoUpdateDescriptionCompleted',

        'todoUpdateStatusCancelled',
        'todoUpdateStatusCompleted',

        'todoUpdatePriorityCancelled',
        'todoUpdatePriorityCompleted',

        'todoUpdateDueDateCancelled',
        'todoUpdateDueDateCompleted',

        'todoUpdateAssignedToCancelled',
        'todoUpdateAssignedToCompleted',
    ];

    public function mount(): void
    {
        $this->todo_status = $this->todo->status;
        $this->title = $this->todo->title;
    }

    public function render(): View
    {
        return view('livewire.todo.dashboard.todo-display');
    }

    public function changeStatus(): void
    {
        /* Todo: Validation */

        $this->todo->status = $this->todo_status;
        $this->todo->save();
        $this->todo = $this->todo->fresh();
        $this->exitMode('updateStatus');

        session()->flash('message', 'Status updated');
    }

    public function updateTitle(): void
    {
        /* Todo: Validation */

        $this->todo->title = $this->title;
        $this->todo->save();
        $this->todo = $this->todo->fresh();
        $this->exitMode('updateTitleMode');

        session()->flash('message', 'Title updated');
    }

    public function todoUpdateTitleCancelled(): void
    {
        $this->exitMode('updateTitleMode');
    }

    public function todoUpdateTitleCompleted(): void
    {
        $this->exitMode('updateTitleMode');
    }

    public function todoUpdateDescriptionCancelled(): void
    {
        $this->exitMode('updateDescriptionMode');
    }

    public function todoUpdateDescriptionCompleted(): void
    {
        $this->exitMode('updateDescriptionMode');
    }

    public function todoUpdateStatusCancelled(): void
    {
        $this->exitMode('updateStatusMode');
    }

    public function todoUpdateStatusCompleted(): void
    {
        $this->exitMode('updateStatusMode');
    }

    public function deleteTodo() // TODO: Type hinting of return type
    {
        $this->todo->delete();

        session()->flash('message', 'Task deleted.');

        /*
         * Is this a good approach? Instead of redirecting cant we just emit some event 
         * and do something better?
         *
         */
        return redirect()->to('/dashboard/todo');
    }

    public function todoUpdatePriorityCancelled(): void
    {
        $this->exitMode('updatePriorityMode');
    }

    public function todoUpdatePriorityCompleted(): void
    {
        $this->exitMode('updatePriorityMode');
    }

    public function todoUpdateDueDateCancelled(): void
    {
        $this->exitMode('updateDueDateMode');
    }

    public function todoUpdateDueDateCompleted(): void
    {
        $this->exitMode('updateDueDateMode');
    }

    public function todoUpdateAssignedToCancelled(): void
    {
        $this->exitMode('updateAssignedToMode');
    }

    public function todoUpdateAssignedToCompleted(): void
    {
        $this->exitMode('updateAssignedToMode');
    }
}
