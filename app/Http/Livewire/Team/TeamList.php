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

    public $teamsCount;

    public function render()
    {
        $teams = Team::paginate(5);
        $this->teamsCount = Team::count();

        return view('livewire.team.team-list')
            ->with('teams', $teams);
    }
}
