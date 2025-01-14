<div>

  
  <x-base-component moduleName="Pages">

    {{--
    |
    | Toolbar.
    |
    --}}

    <x-slot name="toolbar">
      @include ('partials.dashboard.spinner-button')

      @if (! $modes['display'])
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
        @livewire ('cms.dashboard.webpage-create')
      @elseif ($modes['display'])
        @livewire ('cms.dashboard.webpage-display', ['webpage' => $displayingWebpage,])
      @elseif ($modes['list'])
        @livewire ('cms.dashboard.webpage-list')
      @else
        @livewire ('cms.dashboard.webpage-list')
      @endif

    </div>
  </x-base-component>


</div>
