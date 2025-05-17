<?php

namespace App\Services\Appointment;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\UploadedFile;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Appointment;

class AppointmentService
{
    /**
     * Get paginated list of appointments
     *
     * @param int $perPage
     * @return LengthAwarePaginator
     */
    public function getPaginatedAppointments(int $perPage = 5): LengthAwarePaginator
    {
        return Appointment::orderBy('appointment_id', 'DESC')->paginate($perPage);
    }

    /**
     * Create a new appointment
     *
     * @param array $data
     * @param UploadedFile|null $image
     * @return Appointment
     */
    public function createAppointment(array $data): Appointment
    {
        $appointment = Appointment::create($data);

        return $appointment;
    }

    /**
     * Check if a appointment can be deleted.
     *
     * @param int $appointment_id
     * @return void
     */
    public function canDeleteAppointment(int $appointment_id): bool
    {
        $appointment = Appointment::find($appointment_id);

        // Todo

        return true;
    }

    /**
     * Delete appointment
     *
     * @param int $appointment_id
     * @return void
     */
    public function deleteAppointment(int $appointment_id): void
    {
        $appointment = Appointment::find($appointment_id);

        $appointment->delete();
    }

    /**
     * Get total appointment count
     *
     * @return int
     */
    public function getTotalAppointmentCount(): int
    {
        return Appointment::count();
    }
}
