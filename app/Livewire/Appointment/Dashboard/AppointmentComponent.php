<?php

namespace App\Livewire\Appointment\Dashboard;

use Livewire\Component;
use Illuminate\View\View;
use App\Traits\ModesTrait;
use App\Appointment;

class AppointmentComponent extends Component
{
    use ModesTrait;

    public ?Appointment $displayingAppointment;
    public ?Appointment $updatingAppointment;
    public ?Appointment $deletingAppointment;

    public $modes = [
        'createAppointmentMode' => false,
        'listAppointmentMode' => true,
        'displayAppointmentMode' => false,
    ];

    protected $listeners = [
        'displayAppointment',
        'exitAppointmentDisplay',
    ];

    public function render(): View
    {
        return view('livewire.appointment.dashboard.appointment-component');
    }

    public function displayAppointment(int $appointmentId): void
    {
        $this->displayingAppointment = Appointment::find($appointmentId);  
        $this->enterMode('displayAppointmentMode');
    }

    public function exitAppointmentDisplay(): void
    {
        $this->displayingAppointment = null;
        $this->exitMode('displayAppointmentMode');
    }
}
