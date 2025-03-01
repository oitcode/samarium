<?php

namespace App\Livewire\Team\Dashboard;

use Livewire\Component;
use Illuminate\View\View;
use App\Traits\ModesTrait;

class TeamMemberAppointmentSetting extends Component
{
    use ModesTrait;

    public $teamMember;

    public $availabilities; 

    public $timing = [
        'sunday'  => array(),
        'monday'  => array(),
        'tuesday'  => array(),
        'wednesday'  => array(),
        'thursday'  => array(),
        'friday'  => array(),
        'saturday'  => array(),
    ];

    public $modes = [
        'addAvailabilityMode' => false,
    ];

    protected $listeners = [
        'addAvailabilityCancelled',
        'addAvailabilityCompleted',
    ];

    public function render(): View
    {
        $this->availabilities = $this->teamMember->teamMemberAppointmentAvailabilities;

        return view('livewire.team.dashboard.team-member-appointment-setting');
    }

    public function addAvailabilityCancelled(): void
    {
        $this->exitMode('addAvailabilityMode');
    }

    public function addAvailabilityCompleted(): void
    {
        $this->exitMode('addAvailabilityMode');
    }
}
