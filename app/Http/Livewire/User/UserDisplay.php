<?php

namespace App\Http\Livewire\User;

use Livewire\Component;

class UserDisplay extends Component
{
    public $user;

    public function render()
    {
        return view('livewire.user.user-display');
    }
}
