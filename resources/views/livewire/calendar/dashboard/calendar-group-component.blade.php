<div>

  
  <x-base-component moduleName="Calendar Group">

    {{--
    |
    | Toolbar.
    |
    --}}

    <x-slot name="toolbar">
      @include ('partials.dashboard.spinner-button')

      @if (! array_search(true, $modes))
        @include ('partials.dashboard.tool-bar-button-pill', [
            'btnClickMethod' => "enterMode('createCalendarGroupMode')",
            'btnIconFaClass' => 'fas fa-plus-circle',
            'btnText' => 'New',
            'btnCheckMode' => 'createMode',
        ])
      @endif

      @if ($modes['createCalendarGroupMode'] || $modes['displayCalendarGroupMode'])
        @include ('partials.dashboard.tool-bar-button-pill', [
            'btnClickMethod' => "clearModes",
            'btnIconFaClass' => 'fas fa-times',
            'btnText' => '',
            'btnCheckMode' => '',
            'btnBsColor' =>'bg-danger text-white',
        ])
      @endif
    </x-slot>

    <div>

      {{--
      |
      | Use required component as per mode.
      |
      --}}

      @if ($modes['createCalendarGroupMode'])
        @livewire ('calendar.dashboard.calendar-group-create')
      @elseif ($modes['listCalendarGroupMode'])
        @livewire ('calendar.dashboard.calendar-group-list')
      @elseif ($modes['displayCalendarGroupMode'])
        @livewire ('calendar.dashboard.calendar-group-display', ['calendarGroup' => $displayingCalendarGroup,])
      @else
        @livewire ('calendar.dashboard.calendar-group-list')
      @endif

    </div>
  </x-base-component>


</div>
