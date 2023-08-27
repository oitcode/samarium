<?php

namespace App\Http\Livewire\Appointment\Dashboard;

use Livewire\Component;

use App\Appointment;

class AppointmentList extends Component
{
    public $appointments;

    public function render()
    {
        $this->appointments = Appointment::orderBy('appointment_date_time', 'ASC')->get();

        return view('livewire.appointment.dashboard.appointment-list');
    }
}
