<?php

namespace App\Http\Livewire\Team\Dashboard;

use Livewire\Component;

class TeamMemberEditPhone extends Component
{
    public $teamMember;

    public $phone;

    public function mount()
    {
        $this->phone = $this->teamMember->phone;
    }

    public function render()
    {
        return view('livewire.team.dashboard.team-member-edit-phone');
    }

    public function store()
    {
        $validatedData = $this->validate([
            'phone' => 'required',
        ]);

        $this->teamMember->phone = $validatedData['phone'];
        $this->teamMember->save();

        $this->emit('teamMemberUpdatePhoneCompleted');
    }
}
