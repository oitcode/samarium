<?php

namespace App\Livewire\Todo\Dashboard;

use Livewire\Component;
use Illuminate\View\View;

class TodoEditDueDate extends Component
{
    public $todo; 

    public $due_date;

    public function mount(): void
    {
        $this->due_date = $this->todo->due_date;
    }

    public function render(): View
    {
        return view('livewire.todo.dashboard.todo-edit-due-date');
    }

    public function update(): void
    {
        $validatedData = $this->validate([
            'due_date' => 'required|date',
        ]);

        $this->todo->due_date = $validatedData['due_date'];
        $this->todo->save();

        $this->dispatch('todoUpdateDueDateCompleted');
    }
}
