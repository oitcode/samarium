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
      <x-toolbar-button-component btnBsClass="btn-light" btnClickMethod="$refresh">
        <i class="fas fa-refresh"></i>
      </x-toolbar-button-component>
      <x-toolbar-button-component btnBsClass="btn-danger" btnClickMethod="$dispatch('exitAppointmentDisplay')">
        <i class="fas fa-times"></i>
        Close
      </x-toolbar-button-component>
    </x-slot>
  </x-toolbar-component>

  <div class="table-responsive bg-white border mb-2">
    <table class="table border-bottom border mb-0">
      <tbody>
        <tr>
          <th class="o-heading">
            <i class="fas fa-user-circle mr-1"></i>
            Employee name
          </th>
          <td>
            {{ $appointment->teamMember->name }}
          </td>
        </tr>
        <tr>
          <th class="o-heading">
            <i class="fas fa-user-circle mr-1"></i>
            Applicant Name
          </th>
          <td>
            {{ $appointment->applicant_name }}
          </td>
        </tr>
        <tr>
          <th class="o-heading">
            <i class="fas fa-user-circle mr-1"></i>
            Appointment date time
          </th>
          <td>
            {{ $appointment->appointment_date_time }}
          </td>
        </tr>
        <tr>
          <th class="o-heading">
            <i class="fas fa-phone mr-1"></i>
            Applicant Phone
          </th>
          <td>
            {{ $appointment->applicant_phone }}
          </td>
        </tr>
        <tr>
          <th class="o-heading">
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

  {{-- Delete appointment --}}
  <div class="bg-white border p-3 mb-2">
    <div class="col-md-6 p-3 border rounded">
      <div class="o-heading">
        Delete this appointment
      </div>
      <div>
        Once you delete, it cannot be undone. Please be sure.
      </div>
    </div>
  </div>


</div>
