<?php

namespace App\Livewire\Appointment\Dashboard;

use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\View\View;
use Illuminate\Support\Collection;
use Carbon\Carbon;
use App\Appointment;

class AppointmentList extends Component
{
    use WithPagination;

    // public $appointments;

    public int $appointmentCount;
    public int $appointmentTodayCount;

    public function render(): View
    {
        $appointments = Appointment::orderBy('appointment_date_time', 'DESC')->paginate(5);
        $this->appointmentCount = Appointment::count();
        $this->appointmentTodayCount = Appointment::whereDate('appointment_date_time', Carbon::today())->count();

        return view('livewire.appointment.dashboard.appointment-list')
           ->with('appointments', $appointments);
    }
}
