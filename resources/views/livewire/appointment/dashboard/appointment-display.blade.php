<div>

  <div class="d-flex justify-content-between bg-white-rm py-0 mb-1 bg-white border">
    {{-- Breadcrumb --}}
    <div class="my-2 p-2 d-flex flex-column justify-content-center">
      <div>
      Appointment
      <i class="fas fa-angle-right mx-2"></i>
      {{ $appointment->appointment_id }}
      </div>
    </div>

    {{-- Top tool bar --}}
    <div>
      <div>
        <div class="mt-0 p-2 d-flex justify-content-between border-rm">

          <div>
            <button class="btn btn-primary p-3" wire:click="$refresh">
              <i class="fas fa-refresh"></i>
            </button>

            <button class="btn btn-danger p-3" wire:click="$dispatch('exitAppointmentDisplay')">
              <i class="fas fa-times"></i>
              Close
            </button>
          </div>

        </div>
      </div>
    </div>
  </div>

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
