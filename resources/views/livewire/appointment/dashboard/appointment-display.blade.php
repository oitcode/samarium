<div>

  {{--
  |
  | Toolbar.
  |
  --}}

  <x-toolbar-component>
    <x-slot name="toolbarInfo">
      Appointment
      <i class="fas fa-angle-right mx-2"></i>
      {{ $appointment->appointment_id }}
    </x-slot>
    <x-slot name="toolbarButtons">
      <button class="btn btn-primary p-3" wire:click="$refresh">
        <i class="fas fa-refresh"></i>
      </button>

      <button class="btn btn-danger p-3" wire:click="$dispatch('exitAppointmentDisplay')">
        <i class="fas fa-times"></i>
        Close
      </button>
    </x-slot>
  </x-toolbar-component>

  <div class="row">
    <div class="col-md-12">
      <div class="bg-white p-3 border">

        <div class="row">
          <div class="col-md-4">
            <div class="d-flex justify-content-center">
              <div class="d-flex flex-column justify-content-center h-100">
              </div>
            </div>
          </div>
          <div class="col-md-12 d-flex flex-column justify-content-center">

            <div class="table-responsive">
              <table class="table border-bottom">
                <tbody>
                  <tr class="">
                    <th class="">
                      <i class="fas fa-user-circle mr-1"></i>
                      Emplyoee name
                    </th>
                    <td class="">
                      {{ $appointment->teamMember->name }}
                    </td>
                  </tr>
                  <tr class="">
                    <th class="">
                      <i class="fas fa-user-circle mr-1"></i>
                      Applicant Name
                    </th>
                    <td class="">
                      {{ $appointment->applicant_name }}
                    </td>
                  </tr>
                  <tr class="">
                    <th class="">
                      <i class="fas fa-user-circle mr-1"></i>
                      Appointment date time
                    </th>
                    <td class="">
                      {{ $appointment->appointment_date_time }}
                    </td>
                  </tr>
                  <tr>
                    <th>
                      <i class="fas fa-phone mr-1"></i>
                      Applicant Phone
                    </th>
                    <td>
                      {{ $appointment->applicant_phone }}
                    </td>
                  </tr>
                  <tr>
                    <th>
                      <i class="fas fa-envelope mr-1"></i>
                      Description
                    </th>
                    <td>
                      {{ $appointment->applicant_description }}
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-md-4 px-3">
    </div>
  </div>


</div>
