<?php

namespace App\Http\Livewire\Todo\Dashboard;

use Livewire\Component;

class TodoEditStatus extends Component
{
    public $todo;

    public $status;

    public function mount()
    {
        $this->status = $this->todo->tatus;
    }

    public function render()
    {
        return view('livewire.todo.dashboard.todo-edit-status');
    }

    public function update()
    {
        $validatedData = $this->validate([
            'status' => 'required',
        ]);

        $this->todo->status = $validatedData['status'];
        $this->todo->save();;

        $this->emit('todoUpdateStatusCompleted');
    }
}
