<?php

namespace App\Livewire\Todo\Dashboard;

use Livewire\Component;
use Illuminate\View\View;

class TodoEditDescription extends Component
{
    public $todo;

    public $description;

    public function mount()
    {
        $this->description = $this->todo->description;
    }

    public function render(): View
    {
        return view('livewire.todo.dashboard.todo-edit-description');
    }

    public function update(): void
    {
        $validatedData = $this->validate([
            'description' => 'required',
        ]);

        $this->todo->description = $validatedData['description'];
        $this->todo->save();

        $this->dispatch('todoUpdateDescriptionCompleted');
    }
}
