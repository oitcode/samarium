<?php

namespace App\Http\Livewire\Team;

use Livewire\Component;

use App\Team;

class TeamList extends Component
{
    public $teams;

    public function render()
    {
        $this->teams = Team::all();

        return view('livewire.team.team-list');
    }
}
