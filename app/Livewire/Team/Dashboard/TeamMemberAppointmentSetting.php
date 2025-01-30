<?php

namespace App\Livewire\Team\Dashboard;

use Livewire\Component;
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

    public function render()
    {
        /* dd ($this->teamMember); */
        $this->availabilities = $this->teamMember->teamMemberAppointmentAvailabilities;

        return view('livewire.team.dashboard.team-member-appointment-setting');
    }

    public function addAvailabilityCancelled()
    {
        $this->exitMode('addAvailabilityMode');
    }

    public function addAvailabilityCompleted()
    {
        $this->exitMode('addAvailabilityMode');
    }
}
