<?php

namespace App\Http\Livewire\Team;

use Livewire\Component;

use App\Traits\ModesTrait;

class TeamDisplay extends Component
{
    use ModesTrait;

    public $team;

    public $modes = [
        'createTeamMemberMode' => false,
        'createTeamMembersFromCsvMode' => false,
    ];

    protected $listeners = [
        'exitCreateTeamMemberMode',
        'teamMemberCreated',
        'exitAddNewTeamMembersFromFileMode',
    ];

    public function render()
    {
        return view('livewire.team.team-display');
    }

    public function exitCreateTeamMemberMode()
    {
        $this->exitMode('createTeamMemberMode');
    }

    public function teamMemberCreated()
    {
        $this->exitMode('createTeamMemberMode');
    }

    public function exitAddNewTeamMembersFromFileMode()
    {
        $this->exitMode('createTeamMembersFromCsvMode');
    }
}
