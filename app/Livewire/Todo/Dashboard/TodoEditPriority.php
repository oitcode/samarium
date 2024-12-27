<?php

namespace App\Livewire\Todo\Dashboard;

use Livewire\Component;

class TodoEditPriority extends Component
{
    public $todo;

    public $priority;

    public function mount()
    {
        $this->priority = $this->todo->priority;
    }

    public function render()
    {
        return view('livewire.todo.dashboard.todo-edit-priority');
    }

    public function update()
    {
        $validatedData = $this->validate([
            'priority' => 'required',
        ]);

        $this->todo->priority = $validatedData['priority'];
        $this->todo->save();

        $this->dispatch('todoUpdatePriorityCompleted');
    }
}
