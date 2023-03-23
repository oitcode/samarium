<?php

namespace App\Http\Livewire\Team;

use Livewire\Component;

use App\Traits\ModesTrait;

use App\TeamMember;

class TeamDisplay extends Component
{
    use ModesTrait;

    public $team;

    public $updatingTeamMember = null;

    public $modes = [
        'updateTeamMode' => false,
        'createTeamMemberMode' => false,
        'createTeamMembersFromCsvMode' => false,
        'updateTeamMemberMode' => false,
    ];

    protected $listeners = [
        'exitCreateTeamMemberMode',
        'teamMemberCreated',
        'exitAddNewTeamMembersFromFileMode',
        'exitUpdateTeamMode',
        'teamUpdated',
        'exitUpdateTeamMemberMode',
        'teamMemberUpdated',
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

    public function exitUpdateTeamMode()
    {
        $this->exitMode('updateTeamMode');
    }

    public function teamUpdated()
    {
        $this->exitMode('updateTeamMode');
    }

    public function updateTeamMember(TeamMember $teamMember)
    {
        $this->updatingTeamMember = $teamMember;
        $this->enterMode('updateTeamMemberMode');
    }

    public function exitUpdateTeamMemberMode()
    {
        $this->updatingTeamMember = null;
        $this->exitMode('updateTeamMemberMode');
    }

    public function teamMemberUpdated()
    {
        $this->exitUpdateTeamMemberMode();
    }

    public function changePositionUp(TeamMember $teamMember)
    {
        $previousTeamMember = $this->team->teamMembers()
            ->where('position', '<', $teamMember->position)
            ->orderBy('position', 'desc')->first();

        if ($previousTeamMember) {
            $temp = $previousTeamMember->position;
            $previousTeamMember->position = $teamMember->position;
            $teamMember->position = $temp;

            $teamMember->save();
            $previousTeamMember->save();
        } else {
            /* Nothing to do */
        }

        $this->render();
    }

    public function changePositionDown(TeamMember $teamMember)
    {
        $nextTeamMember = $this->team->teamMembers()
            ->where('position', '>', $teamMember->position)
            ->orderBy('position', 'asc')->first();

        if ($nextTeamMember) {
            $temp = $nextTeamMember->position;
            $nextTeamMember->position = $teamMember->position;
            $teamMember->position = $temp;

            $teamMember->save();
            $nextTeamMember->save();
        } else {
            /* Nothing to do */
        }

        $this->render();
    }
}
