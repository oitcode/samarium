<?php

namespace App\Http\Livewire\Todo\Dashboard;

use Livewire\Component;

class TodoEditDescription extends Component
{
    public $todo;

    public $description;

    public function mount()
    {
        $this->description = $this->todo->description;
    }

    public function render()
    {
        return view('livewire.todo.dashboard.todo-edit-description');
    }

    public function update()
    {
        $validatedData = $this->validate([
            'description' => 'required',
        ]);

        $this->todo->description = $validatedData['description'];
        $this->todo->save();

        $this->emit('todoUpdateDescriptionCompleted');
    }
}
