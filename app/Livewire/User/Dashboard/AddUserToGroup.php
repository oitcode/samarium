<?php

namespace App\Livewire\User\Dashboard;

use Livewire\Component;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use App\Models\User\UserGroup;
use App\Models\User\UserUserGroup;

class AddUserToGroup extends Component
{
    public $user;

    public $userGroups;

    public $user_group_id;

    public function render(): View
    {
        $this->userGroups = UserGroup::all();

        return view('livewire.user.dashboard.add-user-to-group');
    }

    public function store(): void
    {
        $validatedData = $this->validate([
            'user_group_id' => 'required|integer',
        ]);

        $validatedData['user_id'] = $this->user->id;
        UserUserGroup::create($validatedData);
        $this->dispatch('addUserToGroupCompleted');
    }
}
