<?php

namespace App\Http\Livewire\Team;

use Livewire\Component;
use Livewire\WithPagination;

use App\Team;

class TeamList extends Component
{
    use WithPagination;

    /* Use bootstrap pagination theme */
    protected $paginationTheme = 'bootstrap';

    // public $teams;

    public $teamSearch = [
        'name' => '',
    ];

    public $teamsCount;

    public $team_search_name;
    public $searchResultTeams;

    public function mount()
    {
    }

    public function render()
    {
        $teams = Team::paginate(5);
        $this->teamsCount = Team::count();

        return view('livewire.team.team-list')
            ->with('teams', $teams);
    }

    public function search()
    {
        $validatedData = $this->validate([
            'team_search_name' => 'required',
        ]);

        $teams = Team::where('name', 'like', '%'.$validatedData['team_search_name'].'%')->get();

        $this->searchResultTeams = $teams;
        
    }
}
