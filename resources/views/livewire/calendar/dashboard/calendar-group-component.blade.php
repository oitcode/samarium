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

      <x-toolbar-dropdown-component toolbarButtonDropdownId="calendarGroupToolbarDropdown">
        <x-toolbar-dropdown-item-component clickMethod="enterMode('search')">
          Search
        </x-toolbar-dropdown-item-component>
      </x-toolbar-dropdown-button>
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
