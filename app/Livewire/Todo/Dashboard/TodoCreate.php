<?php

namespace App\Livewire\Todo\Dashboard;

use Livewire\Component;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use App\Todo;

class TodoCreate extends Component
{
    public $title;
    public $description;

    public function render(): View
    {
        return view('livewire.todo.dashboard.todo-create');
    }

    public function store(): void
    {
        $validatedData = $this->validate([
            'title' => 'required|string|max:254',
            'description' => 'string|max:254|nullable',
        ]);

        $validatedData['status'] = 'pending';
        $validatedData['creator_id'] = Auth::user()->id;

        Todo::create($validatedData);

        $this->dispatch('todoCreated');
    }
}
