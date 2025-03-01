<?php

namespace App\Livewire\Todo\Dashboard;

use Livewire\Component;
use Illuminate\View\View;

class TodoEditTitle extends Component
{
    public $todo;

    public $title;

    public function mount(): void
    {
        $this->title = $this->todo->title;
    }

    public function render(): View
    {
        return view('livewire.todo.dashboard.todo-edit-title');
    }

    public function update(): void
    {
        $validatedData = $this->validate([
            'title' => 'required',
        ]);

        $this->todo->title = $validatedData['title'];
        $this->todo->save();

        $this->dispatch('todoUpdateTitleCompleted');
    }
}
