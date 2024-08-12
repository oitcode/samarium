<?php

namespace App\Livewire\Team\Dashboard;

use Livewire\Component;

class TeamMemberEditName extends Component
{
    public $teamMember;

    public $name;

    public function mount()
    {
        $this->name = $this->teamMember->name;
    }

    public function render()
    {
        return view('livewire.team.dashboard.team-member-edit-name');
    }

    public function store()
    {
        $validatedData = $this->validate([
            'name' => 'required',
        ]);

        $this->teamMember->name = $validatedData['name'];
        $this->teamMember->save();

        $this->dispatch('teamMemberUpdateNameCompleted');
    }
}
