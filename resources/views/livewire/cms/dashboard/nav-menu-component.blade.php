<div>
  
  <x-base-component moduleName="Nav menu">

    {{--
    |
    | Toolbar.
    |
    --}}

    <x-slot name="toolbar">
      @include ('partials.dashboard.spinner-button')

      @if ($displayingCmsNavMenu)
      @else
        @include ('partials.dashboard.tool-bar-button-pill', [
            'btnClickMethod' => "enterMode('create')",
            'btnIconFaClass' => 'fas fa-plus-circle',
            'btnText' => 'Create',
            'btnCheckMode' => 'create',
        ])
      @endif
    </x-slot>

    <div>

      {{--
      |
      | Use required component as per mode.
      |
      --}}

      @if ($modes['create'])
        @livewire ('cms.dashboard.nav-menu-create')
      @elseif ($modes['display'])
        @livewire ('cms.dashboard.nav-menu-display', ['cmsNavMenu' => $displayingCmsNavMenu,])
      @elseif ($modes['list'])
        @livewire ('cms.dashboard.nav-menu-list')
      @endif

    </div>
  </x-base-component>

</div>
