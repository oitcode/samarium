<div>


  {{--
     |
     | Flash message div
     |
  --}}

  @if (session()->has('message'))
    @include ('partials.flash-message', [
        'flashMessage' => session('message'),
    ])
  @endif


  <button wire:loading class="btn">
    <div class="spinner-border text-info mr-3" role="status">
      <span class="sr-only">Loading...</span>
    </div>
  </button>


  {{--
     |
     | Filter div
     |
  --}}

  <div class="mb-3 p-3 bg-white border d-flex justify-content-between">
    <div class="pt-2 font-weight-bold">
      Total : {{ $appointmentCount }}
    </div>
  </div>


  {{--
     |
     | Appointment list table
     |
  --}}
  <div class="table-responsive">
    @if ($appointments && count($appointments) > 0)
      <table class="table table-hover shadow-sm border">
        <thead>
          <tr class="p-4 bg-white text-dark">
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
            <th class="">
              Date
            </th>
            <th>
              Time
            </th>
            <th>
              Status
            </th>
          </tr>
        </thead>

        <tbody class="bg-white">
          @foreach ($appointments as $appointment)
            <tr>
              <td>
                {{ $appointment->appointment_id }}
              </td>
              <td>
                <strong>
                  {{ $appointment->applicant_name }}
                </strong>
              </td>
              <td>
                <div class="">
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
            </tr>
          @endforeach
        </tbody>
      </table>
    @else
      <div class="p-3 text-secondary">
        No appointments.
      </div>
    @endif

  </div>


</div>
