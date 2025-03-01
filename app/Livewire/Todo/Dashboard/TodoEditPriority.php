<?php

namespace App\Livewire\Todo\Dashboard;

use Livewire\Component;
use Illuminate\View\View;

class TodoEditPriority extends Component
{
    public $todo;

    public $priority;

    public function mount(): void
    {
        $this->priority = $this->todo->priority;
    }

    public function render(): View
    {
        return view('livewire.todo.dashboard.todo-edit-priority');
    }

    public function update(): void
    {
        $validatedData = $this->validate([
            'priority' => 'required',
        ]);

        $this->todo->priority = $validatedData['priority'];
        $this->todo->save();

        $this->dispatch('todoUpdatePriorityCompleted');
    }
}
