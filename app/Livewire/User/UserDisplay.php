<?php

namespace App\Livewire\User;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

use App\Traits\ModesTrait;

class UserDisplay extends Component
{
    use ModesTrait;

    public $modes = [
        'addUserToGroupMode' => false,
    ];

    protected $listeners = [
        'addUserToGroupCancelled',
        'addUserToGroupCompleted',
    ];

    public $userWebpageCount;
    public $userPostCount;

    public $user;

    public function render()
    {
        $this->userWebpageCount = $this->user->webpages()->where('is_post', '!=', 'yes')->count();
        $this->userPostCount = $this->user->webpages()->where('is_post', 'yes')->count();

        return view('livewire.user.user-display');
    }

    public function addUserToGroupCancelled()
    {
        $this->exitMode('addUserToGroupMode');
    }

    public function addUserToGroupCompleted()
    {
        $this->exitMode('addUserToGroupMode');
    }

    public function closeThisComponent()
    {
        $this->dispatch('exitUserDisplayMode');
    }
}
