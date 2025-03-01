<?php

namespace App\Livewire\UserGroup\Dashboard;

use Livewire\Component;
use Illuminate\View\View;
use App\Traits\ModesTrait;

class UserGroupDisplay extends Component
{
    use ModesTrait;

    public $userGroup;

    public $modes = [
        'updateNameMode' => false,
        'updateDescriptionMode' => false,
    ];

    public function render(): View
    {
        return view('livewire.user-group.dashboard.user-group-display');
    }
}
