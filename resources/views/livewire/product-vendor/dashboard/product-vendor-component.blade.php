<div>


  {{-- Toolbar --}}
  <x-toolbar-classic toolbarTitle="Product vendor">
    @include ('partials.dashboard.tool-bar-button-pill', [
        'btnClickMethod' => "enterMode('create')",
        'btnIconFaClass' => 'fas fa-plus-circle',
        'btnText' => 'New',
        'btnCheckMode' => 'create',
    ])

    @include ('partials.dashboard.spinner-button')

  </x-toolbar-classic>


  <!-- Flash message div -->
  @if (session()->has('message'))
    @include ('partials.flash-message-modal', ['message' => session('message'),])
  @endif


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
