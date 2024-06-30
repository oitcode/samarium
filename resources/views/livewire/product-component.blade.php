<div class="p-3 p-md-0">


  {{-- Toolbar --}}
  <x-toolbar-classic toolbarTitle="Product">
    @include ('partials.dashboard.spinner-button')

    @include ('partials.dashboard.tool-bar-button-pill', [
        'btnClickMethod' => "enterMode('createProduct')",
        'btnIconFaClass' => 'fas fa-plus-circle',
        'btnText' => 'New',
        'btnCheckMode' => 'createProduct',
    ])

    @if (true)
    @include ('partials.dashboard.tool-bar-button-pill', [
        'btnClickMethod' => "enterMode('list')",
        'btnIconFaClass' => 'fas fa-list',
        'btnText' => 'List',
        'btnCheckMode' => 'list',
    ])
    @endif

    @include ('partials.dashboard.tool-bar-button-pill', [
        'btnClickMethod' => "enterMode('createProductFromCsvMode')",
        'btnIconFaClass' => 'fas fa-file',
        'btnText' => 'Upload from spreadsheet',
        'btnCheckMode' => 'createProductFromCsvMode',
    ])
    @include ('partials.dashboard.tool-bar-button-pill', [
        'btnClickMethod' => "enterMode('search')",
        'btnIconFaClass' => 'fas fa-search',
        'btnText' => 'Search',
        'btnCheckMode' => 'search',
    ])

    @if ($modes['displayProduct'])
      @include ('partials.dashboard.tool-bar-button-pill', [
          'btnClickMethod' => "",
          'btnIconFaClass' => 'fas fa-circle',
          'btnText' => 'Product display',
          'btnCheckMode' => 'displayProduct',
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

    @include ('partials.dashboard.tool-bar-button-pill', [
        'btnClickMethod' => "clearModes",
        'btnIconFaClass' => 'fas fa-times',
        'btnText' => '',
        'btnCheckMode' => '',
    ])

  </x-toolbar-classic>


  <!-- Flash message div -->
  @if (session()->has('message'))
    @if (false)
    <div class="p-2">
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="fas fa-check-circle mr-3"></i>
        {{ session('message') }}
        <button type="button" class="close text-white" data-dismiss="alert" aria-label="Close">
          <span class="text-danger" aria-hidden="true">&times;</span>
        </button>
      </div>
    </div>
    @endif
    @include ('partials.flash-message-modal', ['message' => session('message'),])
  @endif


  <div>

    {{--
    |
    | Use required component as per mode.
    |
    --}}

    @if ($modes['createProduct'])
      @livewire ('product-create')
    @elseif ($modes['createProductFromCsvMode'])
      @livewire ('product-create-from-csv')
    @elseif ($modes['list'])
      @livewire ('product-list')
    @elseif ($modes['search'])
      @livewire ('product-search')
    @elseif ($modes['displayProduct'])
      @livewire ('product-display', ['product' => $displayingProduct,])
    @endif

  </div>


</div>
