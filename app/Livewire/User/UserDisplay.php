<?php

namespace App\Livewire\User;

use App\User;
use Illuminate\View\View;
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

    public int $userWebpageCount;
    public int $userPostCount;

    public User $user;

    public function render(): View
    {
        $this->userWebpageCount = $this->user->webpages()->where('is_post', '!=', 'yes')->count();
        $this->userPostCount = $this->user->webpages()->where('is_post', 'yes')->count();

        return view('livewire.user.user-display');
    }

    public function addUserToGroupCancelled(): void
    {
        $this->exitMode('addUserToGroupMode');
    }

    public function addUserToGroupCompleted(): void
    {
        $this->exitMode('addUserToGroupMode');
    }

    public function closeThisComponent(): void
    {
        $this->dispatch('exitUserDisplayMode');
    }
}
