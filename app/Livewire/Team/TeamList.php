<?php

namespace App\Livewire\Team;

use Livewire\Component;
use Illuminate\View\View;
use Livewire\WithPagination;
use App\Traits\ModesTrait;
use App\Team;

class TeamList extends Component
{
    use WithPagination;
    use ModesTrait;

    /* Use bootstrap pagination theme */
    protected $paginationTheme = 'bootstrap';

    // public $teams;

    public $teamSearch = [
        'name' => '',
    ];

    public $deletingTeam;

    public $modes = [
        'delete' => false, 
        'cannotDelete' => false, 
    ];

    public $teamsCount;

    public $team_search_name;
    public $searchResultTeams;

    public function render(): View
    {
        $teams = Team::paginate(5);
        $this->teamsCount = Team::count();

        return view('livewire.team.team-list')
            ->with('teams', $teams);
    }

    public function search(): void
    {
        $validatedData = $this->validate([
            'team_search_name' => 'required',
        ]);

        $teams = Team::where('name', 'like', '%'.$validatedData['team_search_name'].'%')->get();

        $this->searchResultTeams = $teams;
        
    }

    public function deleteTeam(Team $team): void
    {
        $this->deletingTeam = $team;

        $this->enterMode('delete');

        if (count($team->teamMembers) > 0) {
            $this->enterModeSilent('cannotDelete');
        }
    }

    public function deleteTeamCancel(): void
    {
        $this->deletingTeam = null;
        $this->exitMode('delete');
    }

    public function confirmDeleteTeam(): void
    {
        /* Todo: Delete team members and other things
                 before deletng the team itself.
         */

        $this->deletingTeam->delete();

        $this->deletingTeam = null; 
        $this->exitMode('delete');
    }
}
