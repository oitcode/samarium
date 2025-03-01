<?php

namespace App\Livewire\User;

use Livewire\Component;
use Illuminate\View\View;
use App\Traits\ModesTrait;
use App\User;

class UserComponent extends Component
{
    use ModesTrait;

    public User | null $displayingUser;

    public $modes = [
        'createUserMode' => false,
        'listUserMode' => true,
        'displayUserMode' => false,
    ];

    protected $listeners = [
        'exitCreateUserMode',
        'userCreated',
        'displayUser',
        'exitUserDisplayMode',
    ];

    public function render(): View
    {
        return view('livewire.user.user-component');
    }

    public function userCreated(): void
    {
        $this->exitMode('createUserMode');
    }

    public function exitCreateUserMode(): void
    {
        $this->exitMode('createUserMode');
    }

    public function displayUser(User $user): void
    {
        $this->displayingUser = $user;
        $this->enterMode('displayUserMode');
    }

    public function exitUserDisplayMode(): void
    {
        $this->displayingUser = null;
        $this->clearModes();
    }
}
