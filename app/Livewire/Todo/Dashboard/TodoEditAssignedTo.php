<?php

namespace App\Livewire\Todo\Dashboard;

use Livewire\Component;
use Illuminate\View\View;
use App\Models\User\User;

class TodoEditAssignedTo extends Component
{
    public $todo;

    public $assigned_to_id;

    public $users;

    public function mount(): void
    {
        $this->assigned_to_id = $this->todo->assigned_to_id;
    }

    public function render(): View
    {
        $this->users = User::all();

        return view('livewire.todo.dashboard.todo-edit-assigned-to');
    }

    public function update(): void
    {
        $validatedData = $this->validate([
            'assigned_to_id' => 'required|integer|exists:users,id',
        ]);

        $this->todo->assigned_to_id = $validatedData['assigned_to_id'];
        $this->todo->save();

        $this->dispatch('todoUpdateAssignedToCompleted');
    }
}
