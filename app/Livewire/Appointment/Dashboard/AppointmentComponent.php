<?php

namespace App\Livewire\Appointment\Dashboard;

use Livewire\Component;

use App\Traits\ModesTrait;

use App\Appointment;

class AppointmentComponent extends Component
{
    use ModesTrait;

    public $displayingAppointment;
    public $updatingAppointment;
    public $deletingAppointment;

    public $modes = [
        'createAppointmentMode' => false,
        'listAppointmentMode' => true,
        'displayAppointmentMode' => false,
    ];

    protected $listeners = [
        'displayAppointment',
        'exitAppointmentDisplay',
    ];

    public function render()
    {
        return view('livewire.appointment.dashboard.appointment-component');
    }

    public function displayAppointment(Appointment $appointment)
    {
        $this->displayingAppointment = $appointment;  
        $this->enterMode('displayAppointmentMode');
    }

    public function exitAppointmentDisplay()
    {
        $this->displayingAppointment = null;
        $this->exitMode('displayAppointmentMode');
    }
}
