<?php

namespace App\Http\Livewire\Team\Dashboard;

use Livewire\Component;

class TeamMemberAddAvailability extends Component
{
    public $teamMember;

    public function render()
    {
        return view('livewire.team.dashboard.team-member-add-availability');
    }
}
