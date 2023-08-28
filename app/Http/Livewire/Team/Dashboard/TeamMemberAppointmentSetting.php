<?php

namespace App\Http\Livewire\Team\Dashboard;

use Livewire\Component;

use App\Traits\ModesTrait;

class TeamMemberAppointmentSetting extends Component
{
    use ModesTrait;

    public $teamMember;

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
    ];

    public function render()
    {
        return view('livewire.team.dashboard.team-member-appointment-setting');
    }

    public function addAvailabilityCancelled()
    {
        $this->exitMode('addAvailabilityMode');
    }
}
