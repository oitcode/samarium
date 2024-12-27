<?php

namespace App\Livewire\Todo\Dashboard;

use Livewire\Component;

class TodoEditDueDate extends Component
{
    public $todo; 

    public $due_date;

    public function mount()
    {
        $this->due_date = $this->todo->due_date;
    }

    public function render()
    {
        return view('livewire.todo.dashboard.todo-edit-due-date');
    }

    public function update()
    {
        $validatedData = $this->validate([
            'due_date' => 'required|date',
        ]);

        $this->todo->due_date = $validatedData['due_date'];
        $this->todo->save();

        $this->dispatch('todoUpdateDueDateCompleted');
    }
}
