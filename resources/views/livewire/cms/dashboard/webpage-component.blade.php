<div>
  
  <x-base-component moduleName="Pages">

    {{--
    |
    | Toolbar.
    |
    --}}

    <x-slot name="toolbar">
      @include ('partials.dashboard.spinner-button')

      @if ($modes['list'] || !array_search(true, $modes))
        @include ('partials.dashboard.tool-bar-button-pill', [
            'btnClickMethod' => "enterMode('create')",
            'btnIconFaClass' => 'fas fa-plus-circle',
            'btnText' => 'Create',
            'btnCheckMode' => 'create',
        ])
      @endif

      @if ($modes['list'] || !array_search(true, $modes))
        <x-toolbar-dropdown-component toolbarButtonDropdownId="webpageToolbarDropdown">
          <x-toolbar-dropdown-item-component clickMethod="enterMode('search')">
            Search
          </x-toolbar-dropdown-item-component>
        </x-toolbar-dropdown-button>
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
      @elseif ($modes['search'])
        @livewire ('webpage.dashboard.webpage-search')
      @else
        @livewire ('cms.dashboard.webpage-list')
      @endif

    </div>
  </x-base-component>

</div>
