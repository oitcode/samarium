<?php

namespace App\Livewire\Team\Dashboard;

use Livewire\Component;
use Illuminate\View\View;

class TeamMemberEditName extends Component
{
    public $teamMember;

    public $name;

    public function mount(): void
    {
        $this->name = $this->teamMember->name;
    }

    public function render(): View
    {
        return view('livewire.team.dashboard.team-member-edit-name');
    }

    public function store(): void
    {
        $validatedData = $this->validate([
            'name' => 'required',
        ]);

        $this->teamMember->name = $validatedData['name'];
        $this->teamMember->save();

        $this->dispatch('teamMemberUpdateNameCompleted');
    }
}
