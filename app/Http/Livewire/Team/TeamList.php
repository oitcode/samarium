<?php

namespace App\Http\Livewire\Team;

use Livewire\Component;

use App\Team;

class TeamList extends Component
{
    public $teams;

    public $teamsCount;

    public function render()
    {
        $this->teams = Team::all();
        $this->teamsCount = Team::count();

        return view('livewire.team.team-list');
    }
}
