<div>
  
  <x-base-component moduleName="Purchase">

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
        <x-toolbar-dropdown-component toolbarButtonDropdownId="purchaseToolbarDropdown">
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
        @livewire ('purchase.dashboard.purchase-create')
      @elseif ($modes['list'])
        @livewire ('purchase.dashboard.purchase-list')
      @elseif ($modes['display'])
        @if ($displayingPurchase->creation_status == 'progress')
          @livewire ('purchase.dashboard.purchase-create', [
              'createNew' => false,
              'purchase' => $displayingPurchase,
          ])
        @else
          @livewire ('core.dashboard.core-purchase-display', ['purchase' => $displayingPurchase,])
        @endif
      @elseif ($modes['search'])
        @livewire ('purchase.dashboard.purchase-search')
      @else
        @livewire ('purchase.dashboard.purchase-list')
      @endif

    </div>
  </x-base-component>

</div>
