<?php

namespace App\Livewire\Team\Dashboard;

use Livewire\Component;
use Illuminate\View\View;

class TeamMemberEditPhone extends Component
{
    public $teamMember;

    public $phone;

    public function mount(): void
    {
        $this->phone = $this->teamMember->phone;
    }

    public function render(): View
    {
        return view('livewire.team.dashboard.team-member-edit-phone');
    }

    public function store(): void
    {
        $validatedData = $this->validate([
            'phone' => 'required',
        ]);

        $this->teamMember->phone = $validatedData['phone'];
        $this->teamMember->save();

        $this->dispatch('teamMemberUpdatePhoneCompleted');
    }
}
