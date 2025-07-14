<?php

namespace App\Livewire\Team\Dashboard;

use Livewire\Component;
use Illuminate\View\View;
use App\Traits\ModesTrait;
use App\Models\Team\TeamMember;

class TeamDisplay extends Component
{
    use ModesTrait;

    public $team;

    public $updatingTeamMember = null;
    public $deletingTeamMember = null;

    public $displayTeamName;

    public $modes = [
        'updateTeamMode' => false,
        'createTeamMemberMode' => false,
        'createTeamMembersFromCsvMode' => false,
        'updateTeamMemberMode' => false,
        'deleteTeamMemberMode' => false,
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

    public function render(): View
    {
        return view('livewire.team.dashboard.team-display');
    }

    public function exitCreateTeamMemberMode(): void
    {
        $this->exitMode('createTeamMemberMode');
    }

    public function teamMemberCreated(): void
    {
        $this->exitMode('createTeamMemberMode');
    }

    public function exitAddNewTeamMembersFromFileMode(): void
    {
        $this->exitMode('createTeamMembersFromCsvMode');
    }

    public function exitUpdateTeamMode(): void
    {
        $this->exitMode('updateTeamMode');
    }

    public function teamUpdated(): void
    {
        $this->exitMode('updateTeamMode');
    }

    public function updateTeamMember(TeamMember $teamMember): void
    {
        $this->updatingTeamMember = $teamMember;
        $this->enterMode('updateTeamMemberMode');
    }

    public function exitUpdateTeamMemberMode(): void
    {
        $this->updatingTeamMember = null;
        $this->exitMode('updateTeamMemberMode');
    }

    public function teamMemberUpdated(): void
    {
        $this->exitUpdateTeamMemberMode();
    }

    public function changePositionUp(TeamMember $teamMember): void
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

    public function changePositionDown(TeamMember $teamMember): void
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

    public function deleteTeamMember(TeamMember $teamMember): void
    {
        $this->deletingTeamMember = $teamMember;
        $this->enterMode('deleteTeamMemberMode');
    }

    public function deleteTeamMemberCancel(): void
    {
        $this->deletingTeamMember = null;
        $this->exitMode('deleteTeamMemberMode');
    }

    public function confirmDeleteTeamMember(): void
    {
        $this->deletingTeamMember->delete();

        $this->exitMode('deleteTeamMemberMode');
        session()->flash('message', 'Team member deleted');
    }

    public function closeThisComponent()
    {
        $this->dispatch('exitTeamDisplay');
    }
}
