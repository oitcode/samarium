<div>
  
  <x-base-component moduleName="Product vendor">

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
        <x-toolbar-dropdown-component toolbarButtonDropdownId="productVendorToolbarDropdown">
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
        @livewire ('product-vendor.dashboard.product-vendor-create')
      @elseif ($modes['list'])
        @livewire ('product-vendor.dashboard.product-vendor-list')
      @elseif ($modes['search'])
        @livewire ('product-vendor.dashboard.product-vendor-search')
      @elseif ($modes['display'])
        @livewire ('product-vendor.dashboard.product-vendor-display', ['productVendor' => $displayingProductVendor,])
      @else
        @livewire ('product-vendor.dashboard.product-vendor-list')
      @endif

    </div>
  </x-base-component>

</div>
