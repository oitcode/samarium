<?php

namespace App\Livewire\Appointment\Dashboard;

use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\View\View;
use Illuminate\Support\Collection;
use Carbon\Carbon;
use App\Traits\ModesTrait;
use App\Services\Appointment\AppointmentService;
use App\Appointment;

/**
 * AppointmentList Component
 * 
 * This Livewire component handles the listing of appointments.
 * It also handles deletion of appointments.
 */
class AppointmentList extends Component
{
    use WithPagination;
    use ModesTrait;

    /**
     * Appointments per pagination
     *
     * @var int
     */
    public $perPage = 5;

    /**
     * Total count of appointments
     *
     * @var int
     */
    public $totalAppointmentCount;

    /**
     * Appointment which needs to be deleted
     *
     * @var Appointment
     */
    public $deletingAppointment;

    /**
     * Component display modes
     *
     * @var array
     */
    public $modes = [
        'confirmDelete' => false, 
        'cannotDelete' => false, 
    ];

    /**
     * Render the component
     *
     * @return \Illuminate\View\View
     */
    public function render(AppointmentService $appointmentService): View
    {
        $appointments = $appointmentService->getPaginatedAppointments($this->perPage);
        $this->totalAppointmentCount = $appointmentService->getTotalAppointmentCount();

        return view('livewire.appointment.dashboard.appointment-list', [
            'appointments' => $appointments,
        ]);
    }

    /**
     * Confirm if user really wants to delete a appointment
     *
     * @return void
     */
    public function confirmDeleteAppointment(int $appointment_id, AppointmentService $appointmentService): void
    {
        $this->deletingAppointment = Appointment::find($appointment_id);

        if ($appointmentService->canDeleteAppointment($appointment_id)) {
            $this->enterModeSilent('confirmDelete');
        } else {
            $this->enterModeSilent('cannotDelete');
        }
    }

    /**
     * Cancel appointment delete
     *
     * @return void
     */
    public function cancelDeleteAppointment(): void
    {
        $this->deletingAppointment = null;
        $this->exitMode('confirmDelete');
    }

    /**
     * Turn off the mode that shows that an appointment cannot be deleted
     *
     * @return void
     */
    public function cancelCannotDeleteAppointment(): void
    {
        $this->deletingAppointment = null;
        $this->exitMode('cannotDelete');
    }

    /**
     * Delete contact message
     *
     * @return void
     */
    public function deleteAppointment(AppointmentService $appointmentService): void
    {
        $appointmentService->deleteAppointment($this->deletingAppointment->appointment_id);
        $this->deletingAppointment = null;
        $this->exitMode('confirmDelete');
    }
}
