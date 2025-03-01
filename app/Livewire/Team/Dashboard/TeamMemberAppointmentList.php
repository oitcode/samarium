<?php

namespace App\Livewire\Team\Dashboard;

use Livewire\Component;
use Illuminate\View\View;

class TeamMemberAppointmentList extends Component
{
    public $teamMember;

    public $teamMemberAppointments;

    public function render(): View
    {
        $this->teamMemberAppointments = $this->teamMember->appointments;

        return view('livewire.team.dashboard.team-member-appointment-list');
    }
}
