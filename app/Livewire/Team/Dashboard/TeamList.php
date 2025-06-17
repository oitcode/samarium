<?php

namespace App\Livewire\Team\Dashboard;

use Livewire\Component;
use Illuminate\View\View;
use Livewire\WithPagination;
use App\Traits\ModesTrait;
use App\Services\Team\TeamService;
use App\Models\Team\Team;

/**
 * TeamList Component
 * 
 * This Livewire component handles the listing of teams.
 * It also handles deletion of teams.
 */
class TeamList extends Component
{
    use WithPagination;
    use ModesTrait;

    /**
     * Teams per pagination
     *
     * @var int
     */
    public $perPage = 5;

    /**
     * Total count of teams
     *
     * @var int
     */
    public $totalTeamCount;

    /**
     * Team which needs to be deleted
     *
     * @var Team
     */
    public $deletingTeam = null;

    /**
     * Component display modes
     *
     * @var array
     */
    public $modes = [
        'confirmDelete' => false, 
        'cannotDelete' => false, 
    ];

    /**
     * Render the component
     *
     * @return \Illuminate\View\View
     */
    public function render(TeamService $teamService): View
    {
        $teams = $teamService->getPaginatedTeams($this->perPage);
        $this->totalTeamCount = $teamService->getTotalTeamCount();

        return view('livewire.team.dashboard.team-list', [
            'teams' => $teams,
        ]);
    }

    /**
     * Confirm if user really wants to delete a team
     *
     * @return void
     */
    public function confirmDeleteTeam(int $team_id, TeamService $teamService): void
    {
        $this->deletingTeam = Team::find($team_id);

        if ($teamService->canDeleteTeam($team_id)) {
            $this->enterMode('confirmDelete');
        } else {
            $this->enterMode('cannotDelete');
        }
    }

    /**
     * Cancel team delete
     *
     * @return void
     */
    public function cancelDeleteTeam(): void
    {
        $this->deletingTeam = null;
        $this->exitMode('confirmDelete');
    }

    /**
     * Turn off the mode that shows that a team cannot be deleted
     *
     * @return void
     */
    public function cancelCannotDeleteTeam(): void
    {
        $this->deletingTeam = null;
        $this->exitMode('cannotDelete');
    }

    /**
     * Delete team
     *
     * @return void
     */
    public function deleteTeam(TeamService $teamService): void
    {
        $teamService->deleteTeam($this->deletingTeam->team_id);
        $this->deletingTeam = null;
        $this->exitMode('confirmDelete');
    }
}
