<?php

namespace App\Livewire\User;

use Livewire\Component;

use App\Traits\ModesTrait;

use App\User;

class UserComponent extends Component
{
    use ModesTrait;

    public $displayingUser;

    public $modes = [
        'createUserMode' => false,
        'listUserMode' => true,
        'displayUserMode' => false,
    ];

    protected $listeners = [
        'exitCreateUserMode',
        'userCreated',

        'displayUser',
    ];

    public function render()
    {
        return view('livewire.user.user-component');
    }

    public function userCreated()
    {
        $this->exitMode('createUserMode');
    }

    public function exitCreateUserMode()
    {
        $this->exitMode('createUserMode');
    }

    public function displayUser(User $user)
    {
        $this->displayingUser = $user;
        $this->enterMode('displayUserMode');
    }
}
