<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Traits\ModesTrait;

class TodoDisplay extends Component
{
    use ModesTrait;

    public $todo;

    public $todo_status;

    public $modes = [
        'updateStatus' => false,
    ];

    public function mount()
    {
        $this->todo_status = $this->todo->status;
    }

    public function render()
    {
        return view('livewire.todo-display');
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
}
