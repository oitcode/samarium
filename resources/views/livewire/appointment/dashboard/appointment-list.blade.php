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

  <div class="mb-1 p-3 bg-white border d-flex justify-content-between">
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
            <th class="o-heading">
              ID
            </th>
            <th class="o-heading">
              Applicant
            </th>
            <th class="o-heading">
              Phone
            </th>
            <th class="o-heading">
              Staff name
            </th>
            <th class="o-heading">
              Date
            </th>
            <th class="o-heading">
              Time
            </th>
            <th class="o-heading">
              Status
            </th>
            <th class="o-heading text-right">
              Action
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
              <td class="text-right">
                <button class="btn btn-primary px-2 py-1" wire:click="$dispatch('displayAppointment', { appointment: {{ $appointment }} })">
                  <i class="fas fa-pencil-alt"></i>
                </button>
                <button class="btn btn-success px-2 py-1" wire:click="$dispatch('displayAppointment', { appointment: {{ $appointment }} })">
                  <i class="fas fa-eye"></i>
                </button>
                <button class="btn btn-danger px-2 py-1" wire:click="">
                  <i class="fas fa-trash"></i>
                </button>
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
