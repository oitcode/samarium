<div>

  
  <x-base-component moduleName="Product vendor">

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
          'btnText' => 'New',
          'btnCheckMode' => 'create',
      ])
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
      @elseif ($modes['display'])
        @livewire ('product-vendor.dashboard.product-vendor-display', ['productVendor' => $displayingProductVendor,])
      @else
        @livewire ('product-vendor.dashboard.product-vendor-list')
      @endif

    </div>
  </x-base-component>


</div>
