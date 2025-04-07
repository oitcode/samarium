<div>
  
  <x-base-component moduleName="Appointment">

    {{--
    |
    | Toolbar.
    |
    --}}

    <x-slot name="toolbar">
      @include ('partials.dashboard.spinner-button')

      @if (! array_search(true, $modes) || $modes['listAppointmentMode'])
        <x-toolbar-dropdown-component toolbarButtonDropdownId="appointmentToolbarDropdown">
          <x-toolbar-dropdown-item-component clickMethod="enterMode('search')">
            Search
          </x-toolbar-dropdown-item-component>
        </x-toolbar-dropdown-button>
      @endif
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
