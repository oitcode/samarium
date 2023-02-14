<?php

namespace App\Http\Livewire\Team;

use Livewire\Component;

use App\Team;

use App\Traits\ModesTrait;

class TeamComponent extends Component
{
    use ModesTrait;

    public $modes = [
        'createMode' => false,
        'listMode' => false,
        'displayMode' => false,
    ];

    protected $listeners = [
        'exitCreateMode',
        'teamCreated' => 'exitCreateMode',

        'displayTeam',
    ];

    public $displayingTeam = null;

    public function render()
    {
        return view('livewire.team.team-component');
    }

    public function exitCreateMode()
    {
        $this->exitMode('createMode');
    }

    public function displayTeam(Team $team)
    {
        $this->displayingTeam = $team;
        $this->enterMode('displayMode');
    }
}
