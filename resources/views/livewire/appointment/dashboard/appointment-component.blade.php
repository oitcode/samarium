<div>

  
  <x-base-component moduleName="Appointment">

    {{--
    |
    | Toolbar.
    |
    --}}

    <x-slot name="toolbar">
      @include ('partials.dashboard.spinner-button')

      @if ($modes['listAppointmentMode'] || ! array_search(true, $modes))
        @include ('partials.dashboard.tool-bar-button-pill', [
            'btnClickMethod' => "enterMode('listAppointmentMode')",
            'btnIconFaClass' => 'fas fa-list',
            'btnText' => 'List',
            'btnCheckMode' => 'listAppointmentMode',
        ])
      @endif

      @if ($modes['displayAppointmentMode'])
      @include ('partials.dashboard.tool-bar-button-pill', [
          'btnClickMethod' => "clearModes",
          'btnIconFaClass' => 'fas fa-times',
          'btnText' => '',
          'btnCheckMode' => '',
          'btnBsColor' => 'bg-danger text-white',
      ])
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
      @endif

    </div>
  </x-base-component>


</div>
