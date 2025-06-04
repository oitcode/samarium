<div>
  
  <x-base-component moduleName="Team">

    {{--
    |
    | Toolbar.
    |
    --}}

    <x-slot name="toolbar">
      @include ('partials.dashboard.spinner-button')

      @if (! array_search(true, $modes) || $modes['listMode'])
      @include ('partials.dashboard.tool-bar-button-pill', [
          'btnClickMethod' => "enterMode('createMode')",
          'btnIconFaClass' => 'fas fa-plus-circle',
          'btnText' => 'New',
          'btnCheckMode' => 'createMode',
      ])
      @endif

      @if ($modes['displayMode'])
        @include ('partials.dashboard.tool-bar-button-pill', [
            'btnClickMethod' => "clearModes",
            'btnIconFaClass' => 'fas fa-times',
            'btnText' => '',
            'btnCheckMode' => '',
        ])
      @endif

      @if (! array_search(true, $modes) || $modes['listMode'])
        <x-toolbar-dropdown-component toolbarButtonDropdownId="teamToolbarDropdown">
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

      @if ($modes['createMode'])
        @livewire ('team.dashboard.team-create')
      @elseif ($modes['listMode'])
        @livewire ('team.dashboard.team-list')
      @elseif ($modes['displayMode'])
        @livewire ('team.dashboard.team-display', ['team' => $displayingTeam, 'displayTeamName' => false,])
      @else
        @livewire ('team.dashboard.team-list')
      @endif

    </div>
  </x-base-component>

</div>
