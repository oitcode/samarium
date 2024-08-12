<?php

namespace App\Livewire\User\Dashboard;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

use App\UserGroup;
use App\UserUserGroup;

class AddUserToGroup extends Component
{
    public $user;

    public $userGroups;

    public $user_group_id;

    public function render()
    {
        $this->userGroups = UserGroup::all();

        return view('livewire.user.dashboard.add-user-to-group');
    }

    public function store()
    {
        $validatedData = $this->validate([
            'user_group_id' => 'required|integer',
        ]);

        $validatedData['user_id'] = $this->user->id;

        UserUserGroup::create($validatedData);
        $this->dispatch('addUserToGroupCompleted');
    }
}
