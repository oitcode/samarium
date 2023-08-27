<?php

namespace App\Http\Livewire\Appointment\Dashboard;

use Livewire\Component;

use App\Traits\ModesTrait;

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
    ];

    public function render()
    {
        return view('livewire.appointment.dashboard.appointment-component');
    }
}
