<?php

namespace App\Livewire\User\Dashboard;

use Illuminate\View\View;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\User\User;

class UserProfileDisplay extends Component
{
    public User | null $user;

    public function render(): View
    {
        $this->user = Auth::user();

        return view('livewire.user.dashboard.user-profile-display');
    }
}
