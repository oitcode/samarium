<div>


  <!-- Flash message div -->
  @if (session()->has('message'))
    @include ('partials.flash-message', [
        'flashMessage' => session('message'),
    ])
  @endif


  <button wire:loading class="btn" style="font-size: 1.5rem;">
    <div class="spinner-border text-info mr-3" role="status">
      <span class="sr-only">Loading...</span>
    </div>
  </button>


  {{-- Filter div --}}
  @if (true)
  <div class="mb-3 p-3 bg-white border d-flex justify-content-between">
    <div class="font-weight-bold h6 d-flex">
      <div class="d-flex">
        @if (true)
        <div class="mr-4 font-weight-bold pt-2">
          @if (false)
          <i class="fas fa-filter mr-2"></i>
          @endif
        </div>
        @endif
      </div>
    </div>


    <div class="pt-2 font-weight-bold">
      Total : {{ $appointmentCount }}
    </div>
  </div>
  @endif


  {{-- Show in bigger and smaller screens --}}
  <div class="table-responsive">
    @if ($appointments && count($appointments) > 0)
      <table class="table table-hover shadow-sm border">
        <thead>
          <tr class="{{ env('OC_ASCENT_BG_COLOR', 'bg-success') }}
              {{ env('OC_ASCENT_TEXT_COLOR', 'text-white') }}
              p-4" style="font-size: 1rem;">
            <th>
              ID
            </th>
            <th>
              Applicant
            </th>
            <th>
              Phone
            </th>
            @if (false)
            <th>
              Description
            </th>
            @endif
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
              @if (false)
              <td>
                {{ $appointment->applicant_description }}
              </td>
              @endif
              <td class="h6 font-weight-bold" role="button" wire:click="$emit('displayAppointment', {{ $appointment }})">
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
              @if (false)
              <td>
                @if (false)
                <div class="dropdown">
                  <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-cog text-secondary"></i>
                  </button>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <button class="dropdown-item" wire:click="">
                      <i class="fas fa-file text-primary mr-2"></i>
                      View
                    </button>
                    <button class="dropdown-item" wire:click="">
                      <i class="fas fa-trash text-danger mr-2"></i>
                      Delete
                    </button>
                  </div>
                </div>
                @endif
                <div>
                  <button class="btn" wire:click="deleteContactMessage({{ $contactMessage }})">
                    <i class="fas fa-trash text-danger mr-1"></i>
                    Delete
                  </button>
                  @if ($modes['deleteContactMessageMode'])
                    @if ($deletingContactMessage->contact_message_id == $contactMessage->contact_message_id)
                      <span class="btn btn-danger mx-3" wire:click="confirmDeleteContactMessage">
                        Confirm delete
                      </span>
                      <span class="btn btn-light mr-3" wire:click="deleteContactMessageCancel">
                        Cancel
                      </span>
                    @endif
                  @endif
                </div>

              </td>
              @endif
            </tr>
          @endforeach
        </tbody>
      </table>
    @else
      <div class="p-3 text-secondary">
        No contact messages.
      </div>
    @endif

  </div>


  @if (false)
  @if ($modes['confirmDeleteMode'])
    @livewire ('todo-list-confirm-delete', ['todo' => $deletingTodo,])
  @endif
  @endif


</div>
