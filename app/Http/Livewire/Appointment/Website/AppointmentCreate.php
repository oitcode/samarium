<?php

namespace App\Http\Livewire\Appointment\Website;

use Livewire\Component;

use Carbon\Carbon;

use App\Company;
use App\Appointment;

class AppointmentCreate extends Component
{
    public $company;

    public $teamMember;

    public $appointment_date;
    public $appointment_time;

    public $applicant_name;
    public $applicant_phone;
    public $applicant_description;

    public function render()
    {
        $this->company = Company::first();
        return view('livewire.appointment.website.appointment-create');
    }

    public function store()
    {
        $validatedData = $this->validate([
            'appointment_date' => 'required',
            'appointment_time' => 'required',
            'applicant_name' => 'required',
            'applicant_phone' => 'required',
            'applicant_description' => 'required',
        ]);

        /* Prepare the datetime of appointment */
        $yearMonthDay = explode('-', $this->appointment_date);
        $hourMinute = explode(':', $this->appointment_time);
        $dateTime = Carbon::create($yearMonthDay[0], $yearMonthDay[1], $yearMonthDay[2], $hourMinute[0], $hourMinute[1], '00');

        $appointment = new Appointment;

        $appointment->team_member_id = $this->teamMember->team_member_id;

        $appointment->appointment_date_time = $dateTime;

        $appointment->applicant_name = $this->applicant_name;
        $appointment->applicant_phone = $this->applicant_phone;
        $appointment->applicant_description = $this->applicant_description;

        $appointment->save();

        $this->resetInputFields();
        session()->flash('message', 'Appointment booked');
    }

    public function resetInputFields()
    {
        $this->appointment_date = '';
        $this->appointment_time = '';
        $this->applicant_name = '';
        $this->applicant_phone = '';
        $this->applicant_description = '';
    }
}
