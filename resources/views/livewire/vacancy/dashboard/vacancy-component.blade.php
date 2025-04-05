<div>
  
  <x-base-component moduleName="Vacancy">

    {{--
    |
    | Toolbar.
    |
    --}}

    <x-slot name="toolbar">
      @include ('partials.dashboard.spinner-button')

      @if ($modes['listMode'] || ! array_search(true, $modes))
        @include ('partials.dashboard.tool-bar-button-pill', [
            'btnClickMethod' => "enterMode('createMode')",
            'btnIconFaClass' => 'fas fa-plus-circle',
            'btnText' => 'New',
            'btnCheckMode' => 'createMode',
        ])
      @endif

      <x-toolbar-dropdown-component toolbarButtonDropdownId="vacancyToolbarDropdown">
        <x-toolbar-dropdown-item-component clickMethod="enterMode('search')">
          Search
        </x-toolbar-dropdown-item-component>
      </x-toolbar-dropdown-button>
    </x-slot>

    <div>

      {{--
         |
         | Use required component as per mode
         |
      --}}

      @if ($modes['createMode'])
        @livewire ('vacancy.dashboard.vacancy-create')
      @elseif ($modes['listMode'])
        @livewire ('vacancy.dashboard.vacancy-list')
      @elseif ($modes['displayMode'])
        @livewire ('vacancy.dashboard.vacancy-display', ['vacancy' => $displayingVacancy,])
      @elseif ($modes['updateMode'])
        @livewire ('vacancy-update', ['vacancy' => $updatingVacancy,])
      @else
        @livewire ('vacancy.dashboard.vacancy-list')
      @endif

    </div>
  </x-base-component>

</div>
