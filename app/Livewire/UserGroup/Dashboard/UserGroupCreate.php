<?php

namespace App\Livewire\UserGroup\Dashboard;

use Livewire\Component;
use Illuminate\View\View;
use App\UserGroup;

class UserGroupCreate extends Component
{
    public $name;
    public $description;

    public function render(): View
    {
        return view('livewire.user-group.dashboard.user-group-create');
    }

    public function store(): void
    {
        $validatedData = $this->validate([
            'name' => 'required|string',
            'description' => 'required|string',
        ]);

        UserGroup::create($validatedData);
        $this->dispatch('createUserGroupCompleted');
    }
}
