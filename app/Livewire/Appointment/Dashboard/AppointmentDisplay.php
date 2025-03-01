<?php

namespace App\Livewire\Appointment\Dashboard;

use Livewire\Component;
use Illuminate\View\View;

class AppointmentDisplay extends Component
{
    public $appointment;

    public function render(): View
    {
        return view('livewire.appointment.dashboard.appointment-display');
    }
}
