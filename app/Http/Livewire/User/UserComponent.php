<?php

namespace App\Http\Livewire\User;

use Livewire\Component;

use App\Traits\ModesTrait;

class UserComponent extends Component
{
    use ModesTrait;

    public $modes = [
        'createUserMode' => false,
        'listUserMode' => false,
    ];

    protected $listeners = [
        'exitCreateUserMode',
        'userCreated',
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
}
