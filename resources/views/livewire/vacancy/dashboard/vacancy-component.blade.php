<div>

  
  <x-base-component moduleName="Vacancy">

    {{--
    |
    | Toolbar.
    |
    --}}

    <x-slot name="toolbar">
      @include ('partials.dashboard.spinner-button')

      @include ('partials.dashboard.tool-bar-button-pill', [
          'btnClickMethod' => "enterMode('createMode')",
          'btnIconFaClass' => 'fas fa-plus-circle',
          'btnText' => 'New',
          'btnCheckMode' => 'createMode',
      ])

      @include ('partials.dashboard.tool-bar-button-pill', [
          'btnClickMethod' => "enterMode('listMode')",
          'btnIconFaClass' => 'fas fa-list',
          'btnText' => 'List',
          'btnCheckMode' => 'listMode',
      ])

      @if ($modes['displayMode'])
        @include ('partials.dashboard.tool-bar-button-pill', [
            'btnClickMethod' => "enterMode('displayMode')",
            'btnIconFaClass' => 'fas fa-circle',
            'btnText' => 'Vacancy display',
            'btnCheckMode' => 'displayMode',
        ])
      @endif

      @include ('partials.dashboard.tool-bar-button-pill', [
          'btnClickMethod' => "clearModes",
          'btnIconFaClass' => 'fas fa-times',
          'btnText' => '',
          'btnCheckMode' => '',
      ])
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
      @endif

    </div>
  </x-base-component>


</div>
