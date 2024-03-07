<?php

namespace App\Http\Livewire\UserGroup\Dashboard;

use Livewire\Component;

use App\Traits\ModesTrait;

class UserGroupDisplay extends Component
{
    use ModesTrait;

    public $userGroup;

    public $modes = [
        'updateNameMode' => false,
        'updateDescriptionMode' => false,
    ];

    public function render()
    {
        return view('livewire.user-group.dashboard.user-group-display');
    }
}
