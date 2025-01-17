<div>

  
  <x-base-component moduleName="Institution">

    {{--
    |
    | Toolbar.
    |
    --}}

    <x-slot name="toolbar">
      @include ('partials.dashboard.spinner-button')

      @include ('partials.dashboard.tool-bar-button-pill', [
          'btnClickMethod' => "enterMode('create')",
          'btnIconFaClass' => 'fas fa-plus-circle',
          'btnText' => 'Create',
          'btnCheckMode' => 'create',
      ])
    </x-slot>

    <div>

      {{--
         |
         | Use the required component as per mode
         |
      --}}

      @if ($modes['create'])
        @livewire ('educ.institution.dashboard.institution-create')
      @elseif ($modes['list'])
        @livewire ('educ.institution.dashboard.institution-list')
      @elseif ($modes['display'])
        @livewire ('educ.institution.dashboard.institution-display', ['educInstitution' => $displayingEducInstitution,])
      @else
        @livewire ('educ.institution.dashboard.institution-list')
      @endif

    </div>
  </x-base-component>


</div>
