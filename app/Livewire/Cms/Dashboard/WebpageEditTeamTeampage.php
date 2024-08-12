<?php

namespace App\Livewire\Cms\Dashboard;

use Livewire\Component;

use App\Team;
use App\WebpageTeam;

class WebpageEditTeamTeampage extends Component
{
    public $webpage;

    public $teams;

    public $team_id;

    public function render()
    {
        $this->teams = Team::all();

        return view('livewire.cms.dashboard.webpage-edit-team-teampage');
    }

    public function store()
    {
        $validatedData = $this->validate([
            'team_id' => 'required',
        ]);

        $validatedData['webpage_id'] = $this->webpage->webpage_id;

        WebpageTeam::create($validatedData);

        $this->dispatch('webpageEditTeamTeampageCompleted');
    }
}
