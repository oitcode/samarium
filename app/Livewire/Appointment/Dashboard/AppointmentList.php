<?php

namespace App\Livewire\Appointment\Dashboard;

use Livewire\Component;

use Carbon\Carbon;

use App\Appointment;

class AppointmentList extends Component
{
    public $appointments;

    public $appointmentCount;
    public $appointmentTodayCount;

    public function render()
    {
        $this->appointments = Appointment::orderBy('appointment_date_time', 'DESC')->get();
        $this->appointmentCount = Appointment::count();
        $this->appointmentTodayCount = Appointment::whereDate('appointment_date_time', Carbon::today())->count();

        return view('livewire.appointment.dashboard.appointment-list');
    }
}
