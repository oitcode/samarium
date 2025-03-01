<?php

namespace App\Livewire\Team\Dashboard;

use Livewire\Component;
use Illuminate\View\View;

class TeamMemberEditEmail extends Component
{
    public $teamMember;

    public $email;

    public function mount(): void
    {
        $this->email = $this->teamMember->email;
    }

    public function render(): View
    {
        return view('livewire.team.dashboard.team-member-edit-email');
    }

    public function store(): void
    {
        $validatedData = $this->validate([
            'email' => 'required',
        ]);

        $this->teamMember->email = $validatedData['email'];
        $this->teamMember->save();

        $this->dispatch('teamMemberUpdateEmailCompleted');
    }
}
