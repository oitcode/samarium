<div class="p-3 p-md-0">

  {{--
  |
  | Toolbar
  |
  | Top toolbar of the component.
  |
  --}}

  {{-- Show in bigger screens --}}
  <x-toolbar-classic toolbarTitle="Product">
    @include ('partials.dashboard.spinner-button')

    @include ('partials.dashboard.tool-bar-button-pill', [
        'btnClickMethod' => "enterMode('createProduct')",
        'btnIconFaClass' => 'fas fa-plus-circle',
        'btnText' => 'New',
        'btnCheckMode' => 'createProduct',
    ])

    @if (false)
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
        'btnIconFaClass' => 'fas fa-refresh',
        'btnText' => '',
        'btnCheckMode' => '',
    ])

  </x-toolbar-classic>

  <!-- Flash message div -->
  @if (session()->has('message'))
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

  <div class="" style="">

    <div class="">

      {{-- Use required component as per mode --}}
      @if ($modes['createProduct'])
        @livewire ('cafe-menu-product-create')
      @elseif ($modes['createProductCategory'])
        @livewire ('cafe-menu-product-category-create')
      @elseif ($modes['updateProduct'])
        @livewire ('cafe-menu-product-edit', ['product' => $updatingProduct,])
      @elseif ($modes['showFullMenuList'])
        @livewire ('cafe-menu-full-list')
      @elseif ($modes['updateProductCategory'])
        @livewire ('cafe-menu-product-category-edit', ['productCategory' => $updatingProductCategory,])
      @elseif ($modes['displayProduct'])
        @livewire ('cafe-menu-product-display', ['product' => $displayingProduct,])
      @elseif ($modes['list'])
        @if (false)
        @livewire ('cafe-menu-list')
        @endif
      @elseif ($modes['createProductFromCsvMode'])
        @if (true)
        @livewire ('cafe-menu-product-create-from-csv')
        @endif
      @elseif ($modes['search'])
        @livewire ('cafe-menu-product-search')
      @endif
    </div>
  </div>
</div>
