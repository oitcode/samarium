<?php

namespace App\Http\Livewire\Team\Dashboard;

use Livewire\Component;

class TeamMemberEditEmail extends Component
{
    public $teamMember;

    public $email;

    public function mount()
    {
        $this->email = $this->teamMember->email;
    }

    public function render()
    {
        return view('livewire.team.dashboard.team-member-edit-email');
    }

    public function store()
    {
        $validatedData = $this->validate([
            'email' => 'required',
        ]);

        $this->teamMember->email = $validatedData['email'];
        $this->teamMember->save();

        $this->emit('teamMemberUpdateEmailCompleted');
    }
}
