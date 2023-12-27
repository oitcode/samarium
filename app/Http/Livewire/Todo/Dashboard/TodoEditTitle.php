<?php

namespace App\Http\Livewire\Todo\Dashboard;

use Livewire\Component;

class TodoEditTitle extends Component
{
    public $todo;

    public $title;

    public function mount()
    {
        $this->title = $this->todo->title;
    }

    public function render()
    {
        return view('livewire.todo.dashboard.todo-edit-title');
    }

    public function update()
    {
        $validatedData = $this->validate([
            'title' => 'required',
        ]);

        $this->todo->title = $validatedData['title'];
        $this->todo->save();

        $this->emit('todoUpdateTitleCompleted');
    }
}
