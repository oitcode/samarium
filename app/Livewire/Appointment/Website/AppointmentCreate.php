<?php

namespace App\Livewire\Appointment\Website;

use Livewire\Component;
use Illuminate\View\View;
use Carbon\Carbon;
use App\Company;
use App\Models\Appointment\Appointment;
use App\TeamMember;

class AppointmentCreate extends Component
{
    public Company $company;

    public TeamMember $teamMember;

    public string $appointment_date;
    public string $appointment_time;
    public string $applicant_name;
    public string $applicant_phone;
    public string $applicant_description;

    public array $availableTimes;

    public function render(): View
    {
        $this->company = Company::first();
        return view('livewire.appointment.website.appointment-create');
    }

    public function store(): void
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
        $appointment->status = 'requested';

        $appointment->save();

        $this->resetInputFields();
        session()->flash('message', 'Appointment booked');
    }

    public function resetInputFields(): void
    {
        $this->appointment_date = '';
        $this->appointment_time = '';
        $this->applicant_name = '';
        $this->applicant_phone = '';
        $this->applicant_description = '';
    }

    public function getAvailableTimesForDay($day): array
    {
        $appointmentAvailabilities = $this->teamMember->teamMemberAppointmentAvailabilities()->where('day', $day)->get();

        $times = [
            '00:00', '00:30', '01:00', '01:30', '02:00', '02:30', '03:00', '03:30', '04:00', '04:30',
            '05:00', '05:30', '06:00', '06:30', '07:00', '07:30', '08:00', '08:30', '9:00', '9:30',
            '10:00', '10:30', '11:00', '11:30', '12:00', '12:30', '13:00', '13:30', '14:00', '14:30',
            '15:00', '15:30', '16:00', '16:30', '17:00', '17:30', '18:00', '18:30', '19:00', '19:30',
            '20:00', '20:30', '21:00', '21:30', '22:00', '22:30', '23:00', '23:30',
        ];

        $availableTimes = [];

        foreach ($appointmentAvailabilities as $appointmentAvailability) {
            foreach ($times as $t) {
                $startTime = substr($appointmentAvailability->start_time, 0, -3);
                $endTime = substr($appointmentAvailability->end_time, 0, -3);
                if ($t >= $startTime && $t <= $endTime) {
                    $availableTimes[] = $t;
                }
            }
        }

        return $availableTimes;
    }

    public function fillAvailableTimes(): void
    {
        $yearMonthDay = explode('-', $this->appointment_date);
        $dateTime = Carbon::create($yearMonthDay[0], $yearMonthDay[1], $yearMonthDay[2], '00', '00', '00');
        $day = $dateTime->format('l');
        $this->availableTimes = $this->getAvailableTimesForDay($day);
    }

    public function updatedAppointmentDate(): void
    {
        $this->fillAvailableTimes();
    }
}
