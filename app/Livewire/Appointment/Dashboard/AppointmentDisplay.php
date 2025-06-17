<?php

namespace App\Livewire\Appointment\Dashboard;

use Livewire\Component;
use Illuminate\View\View;
use App\Models\Appointment\Appointment;

class AppointmentDisplay extends Component
{
    public Appointment $appointment;

    public function render(): View
    {
        return view('livewire.appointment.dashboard.appointment-display');
    }
}
