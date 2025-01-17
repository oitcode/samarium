<div>

  
  <x-base-component moduleName="Appointment">

    {{--
    |
    | Toolbar.
    |
    --}}

    <x-slot name="toolbar">
      @include ('partials.dashboard.spinner-button')
    </x-slot>

    <div>

      {{--
         |
         | Use the required component as per mode
         |
      --}}

      @if ($modes['listAppointmentMode'])
        @livewire ('appointment.dashboard.appointment-list')
      @elseif ($modes['displayAppointmentMode'])
        @livewire ('appointment.dashboard.appointment-display', ['appointment' => $displayingAppointment,])
      @else
        @livewire ('appointment.dashboard.appointment-list')
      @endif

    </div>
  </x-base-component>


</div>
