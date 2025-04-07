<div>
  
  <x-base-component moduleName="Link">

    {{--
    |
    | Toolbar.
    |
    --}}

    <x-slot name="toolbar">
      @include ('partials.dashboard.spinner-button')

      @if (! array_search(true, $modes) || $modes['list'])
        @include ('partials.dashboard.tool-bar-button-pill', [
            'btnClickMethod' => "enterMode('create')",
            'btnIconFaClass' => 'fas fa-plus-circle',
            'btnText' => 'Create',
            'btnCheckMode' => 'create',
        ])

        <x-toolbar-dropdown-component toolbarButtonDropdownId="urlLinkToolbarDropdown">
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

      @if ($modes['create'])
        @livewire ('url-link.dashboard.url-link-create')
      @elseif ($modes['list'])
        @livewire ('url-link.dashboard.url-link-list')
      @elseif ($modes['display'])
        @livewire ('url-link.dashboard.url-link-display', ['urlLink' => $displayingUrlLink,])
      @else
        @livewire ('url-link.dashboard.url-link-list')
      @endif

    </div>
  </x-base-component>

</div>
