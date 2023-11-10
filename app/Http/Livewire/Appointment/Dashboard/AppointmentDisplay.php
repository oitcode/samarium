<?php

namespace App\Http\Livewire\Appointment\Dashboard;

use Livewire\Component;

class AppointmentDisplay extends Component
{
    public $appointment;

    public function render()
    {
        return view('livewire.appointment.dashboard.appointment-display');
    }
}
