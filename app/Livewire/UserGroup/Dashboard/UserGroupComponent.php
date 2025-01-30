<?php

namespace App\Livewire\UserGroup\Dashboard;

use Livewire\Component;
use App\Traits\ModesTrait;
use App\UserGroup;

class UserGroupComponent extends Component
{
    use ModesTrait;

    public $displayingUserGroup;

    public $modes = [
        'createUserGroupMode' => false,
        'listUserGroupMode' => true,
        'displayUserGroupMode' => false,
    ];

    protected $listeners = [
        'exitCreateUserGroupMode',
        'userGroupCreated',

        'displayUserGroup',

        'createUserGroupCompleted',
    ];

    public function render()
    {
        return view('livewire.user-group.dashboard.user-group-component');
    }

    public function exitCreateUserGroupMode()
    {
        $this->exitMode('createUserGroupMode');
    }

    public function createUserGroupCompleted()
    {
        session()->flash('message', 'User group created');
        $this->exitMode('createUserGroupMode');
    }

    public function displayUserGroup(UserGroup $userGroup)
    {
        $this->displayingUserGroup = $userGroup;
        $this->enterMode('displayUserGroupMode');
    }
}
