<?php

namespace App\Livewire\Todo\Dashboard;

use Livewire\Component;
use Illuminate\View\View;

class TodoEditStatus extends Component
{
    public $todo;

    public $status;

    public function mount(): void
    {
        $this->status = $this->todo->status;
    }

    public function render(): View
    {
        return view('livewire.todo.dashboard.todo-edit-status');
    }

    public function update(): void
    {
        $validatedData = $this->validate([
            'status' => 'required',
        ]);

        $this->todo->status = $validatedData['status'];
        $this->todo->save();;

        $this->dispatch('todoUpdateStatusCompleted');
    }
}
