<div>
  
  <x-base-component moduleName="Customer">

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
            'btnText' => 'New',
            'btnCheckMode' => 'create',
        ])
      @endif

      @if ($modes['list'] || !array_search(true, $modes))
        <x-toolbar-dropdown-component toolbarButtonDropdownId="customerToolbarDropdown">
          <x-toolbar-dropdown-item-component clickMethod="enterMode('search')">
            Search
          </x-toolbar-dropdown-item-component>
        </x-toolbar-dropdown-button>
      @endif
    </x-slot>

    <div>

      {{--
         |
         | Use required component as per mode
         |
      --}}

      @if ($modes['create'])
        @livewire ('customer.dashboard.customer-create')
      @elseif ($modes['list'])
        @livewire ('customer.dashboard.customer-list')
      @elseif ($modes['search'])
        @livewire ('customer.dashboard.customer-search')
      @elseif ($modes['display'])
        @livewire ('customer.dashboard.customer-display', ['customer' => $displayingCustomer,])
      @else
        @livewire ('customer.dashboard.customer-list')
      @endif

    </div>
  </x-base-component>

</div>
