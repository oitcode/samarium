<?php

namespace App\Livewire\Team\Dashboard;

use Livewire\Component;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use App\Models\Team\TeamMemberAppointmentAvailability;

class TeamMemberAddAvailability extends Component
{
    public $teamMember;

    public $available_day;
    public $start_time;
    public $end_time;

    public function render(): View
    {
        return view('livewire.team.dashboard.team-member-add-availability');
    }

    public function store(): void
    {
        $validatedData = $this->validate([
            'available_day' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
        ]);

        $validatedData['team_member_id'] = $this->teamMember->team_member_id;
        $validatedData['day'] = $validatedData['available_day'];
        $validatedData['start_time'] = $validatedData['start_time'] . ':00:00';
        $validatedData['end_time'] = $validatedData['end_time'] . ':00:00';

        TeamMemberAppointmentAvailability::create($validatedData);

        $this->resetInputFields();

        session()->flash('message', 'Appointment availability created');
        $this->dispatch('addAvailabilityCompleted');
    }

    public function resetInputFields(): void
    {
        $this->available_day = '';
        $this->start_time = '';
        $this->end_time = '';
    }
}
