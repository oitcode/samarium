<?php

namespace App\Http\Livewire\Team\Dashboard;

use Livewire\Component;

class TeamMemberAppointmentList extends Component
{
    public $teamMember;

    public $teamMemberAppointments;

    public function render()
    {
        $this->teamMemberAppointments = $this->teamMember->appointments;

        return view('livewire.team.dashboard.team-member-appointment-list');
    }
}
