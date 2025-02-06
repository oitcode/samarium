<?php

namespace App\Livewire\User\Dashboard;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class UserProfileDisplay extends Component
{
    public $user;

    public function render()
    {
        $this->user = Auth::user();

        return view('livewire.user.dashboard.user-profile-display');
    }
}
