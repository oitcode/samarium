<div class="p-3-rm p-md-0">


  {{-- Toolbar --}}
  <x-toolbar-classic toolbarTitle="Product">
    @include ('partials.dashboard.spinner-button')

    @if (! $modes['displayProduct'])
      @include ('partials.dashboard.tool-bar-button-pill', [
          'btnClickMethod' => "enterMode('createProduct')",
          'btnIconFaClass' => 'fas fa-plus-circle',
          'btnText' => 'New',
          'btnCheckMode' => 'createProduct',
      ])
    @endif

    @if ($modes['updateProduct'])
      @include ('partials.dashboard.tool-bar-button-pill', [
          'btnClickMethod' => "",
          'btnIconFaClass' => 'fas fa-circle',
          'btnText' => 'Product update',
          'btnCheckMode' => 'updateProduct',
      ])
    @endif

  </x-toolbar-classic>


  <!-- Flash message div -->
  @if (session()->has('message'))
    @include ('partials.flash-message-modal', ['message' => session('message'),])
  @endif


  <div>

    {{--
    |
    | Use required component as per mode.
    |
    --}}

    @if ($modes['createProduct'])
      @livewire ('product.dashboard.product-create')
    @elseif ($modes['createProductFromCsvMode'])
      @livewire ('product.dashboard.product-create-from-csv')
    @elseif ($modes['list'])
      @livewire ('product.dashboard.product-list')
    @elseif ($modes['search'])
      @livewire ('product.dashboard.product-search')
    @elseif ($modes['displayProduct'])
      @livewire ('product.dashboard.product-display', ['product' => $displayingProduct,])
    @else
      @livewire ('product.dashboard.product-list')
    @endif

  </div>


</div>
