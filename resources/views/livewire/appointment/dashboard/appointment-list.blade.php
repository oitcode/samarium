<div>

  <x-list-component>
    <x-slot name="listInfo">
      Total : {{ $totalAppointmentCount }}
    </x-slot>

    <x-slot name="listHeadingRow">
      <th>
        ID
      </th>
      <th>
        Applicant
      </th>
      <th>
        Phone
      </th>
      <th>
        Staff name
      </th>
      <th>
        Date
      </th>
      <th>
        Time
      </th>
      <th>
        Status
      </th>
      <th class="text-right">
        Action
      </th>
    </x-slot>

    <x-slot name="listBody">
      @foreach ($appointments as $appointment)
        <x-table-row-component>
          <td>
            {{ $appointment->appointment_id }}
          </td>
          <td>
            <strong>
              {{ $appointment->applicant_name }}
            </strong>
          </td>
          <td>
            <div>
              {{ $appointment->applicant_phone }}
            </div>
          </td>
          <td class="h6 font-weight-bold" role="button" wire:click="$dispatch('displayAppointment', { appointment: {{ $appointment }} })">
            {{ $appointment->teamMember->name }}
          </td>
          <td>
            {{ \Carbon\Carbon::create($appointment->appointment_date_time)->toDateString() }}
          </td>
          <td>
            {{ \Carbon\Carbon::create($appointment->appointment_date_time)->toTimeString() }}
          </td>
          <td>
            @if ($appointment->status == 'requested')
              <span class="badge badge-pill badge-danger badge-primary">
              {{ $appointment->status }}
              </span>
            @elseif ($appointment->status == 'accepted')
              <span class="badge badge-pill badge-primary badge-primary">
              {{ $appointment->status }}
              </span>
            @elseif ($appointment->status == 'rejected')
              <span class="badge badge-pill badge-dark badge-primary">
              {{ $appointment->status }}
              </span>
            @elseif ($appointment->status == 'progress')
              <span class="badge badge-pill badge-warning badge-primary">
              {{ $appointment->status }}
              </span>
            @elseif ($appointment->status == 'done')
              <span class="badge badge-pill badge-success badge-primary">
              {{ $appointment->status }}
              </span>
            @else
              <span class="badge badge-pill badge-light badge-primary">
                Unknown
              </span>
            @endif
          </td>
          <td class="text-right">
            @if ($modes['confirmDelete'])
              @if ($deletingAppointment->appointment_id == $appointment->appointment_id)
                <button class="btn btn-danger mr-1" wire:click="deleteAppointment">
                  Confirm delete
                </button>
                <button class="btn btn-light mr-1" wire:click="cancelDeleteAppointment">
                  Cancel
                </button>
              @endif
            @endif
            @if ($modes['cannotDelete'])
              @if ($deletingAppointment->appointment_id == $appointment->appointment_id)
                <span class="text-danger mr-3">
                  <i class="fas fa-exclamation-circle mr-1"></i>
                  Appointment cannot be deleted
                </span>
                <button class="btn btn-light mr-1" wire:click="cancelCannotDeleteAppointment">
                  Cancel
                </button>
              @endif
            @endif
            <x-list-edit-button-component clickMethod="$dispatch('displayAppointment', { appointmentId: {{ $appointment->appointment_id }} })">
            </x-list-edit-button-component>
            <x-list-view-button-component clickMethod="$dispatch('displayAppointment', { appointmentId: {{ $appointment->appointment_id }} })">
            </x-list-view-button-component>
            <x-list-delete-button-component clickMethod="confirmDeleteAppointment({{ $appointment->appointment_id }})">
            </x-list-delete-button-component>
          </td>
        </x-table-row-component>
      @endforeach
    </x-slot>

    <x-slot name="listPaginationLinks">
      {{ $appointments->links() }}
    </x-slot>
  </x-list-component>

</div>
