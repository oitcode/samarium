<div class="p-3 p-md-0">

  {{--
  |
  | Toolbar
  |
  | Top toolbar of the component.
  |
  --}}

  {{-- Show in bigger screens --}}
  <div class="mb-3 p-2 d-none d-md-block bg-dark-rm">
    @include ('partials.dashboard.tool-bar-button-pill', [
        'btnClickMethod' => "enterMode('createProduct')",
        'btnIconFaClass' => 'fas fa-plus-circle',
        'btnText' => 'New',
        'btnCheckMode' => 'createProduct',
    ])

    @include ('partials.dashboard.tool-bar-button-pill', [
        'btnClickMethod' => "enterMode('createProductCategory')",
        'btnIconFaClass' => 'fas fa-plus-circle',
        'btnText' => 'Category',
        'btnCheckMode' => 'createProductCategory',
    ])

    @include ('partials.dashboard.tool-bar-button-pill', [
        'btnClickMethod' => "enterMode('list')",
        'btnIconFaClass' => 'fas fa-list',
        'btnText' => 'List',
        'btnCheckMode' => 'list',
    ])

    @include ('partials.dashboard.tool-bar-button-pill', [
        'btnClickMethod' => "enterMode('createProductFromCsvMode')",
        'btnIconFaClass' => 'fas fa-file',
        'btnText' => 'Upload from spreadsheet',
        'btnCheckMode' => 'createProductFromCsvMode',
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
        'btnIconFaClass' => 'fas fa-eraser',
        'btnText' => 'Clear modes',
        'btnCheckMode' => '',
    ])

    @include ('partials.dashboard.spinner-button')

    <div class="clearfix">
    </div>
  </div>

  {{-- Show in smaller screens --}}
  <div class="mb-3 d-md-none">
    <button class="btn
        @if ($modes['createProduct'])
          btn-success
        @else
          bg-white
        @endif
        m-0 border shadow-sm badge-pill mr-3 mb-3"
        style="font-size: 1rem;"
        wire:click="enterMode('createProduct')">
      <i class="fas fa-plus-circle mr-3"></i>
      Add product
    </button>

    <button class="btn
        @if ($modes['createProductCategory'])
          btn-success
        @else
          bg-white
        @endif
        m-0 border shadow-sm badge-pill mr-3 mb-3"
        style="font-size: 1rem;"
        wire:click="enterMode('list')">
      <i class="fas fa-list mr-3"></i>
      List
    </button>

    <button wire:loading class="btn m-0"
        style="font-size: 1.5rem;">
      <span class="spinner-border text-info mr-3" role="status">
      </span>
    </button>

    <div class="d-inline-block float-right">
      <div class="dropdown">
        <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-cog text-secondary"></i>
        </button>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton" style="font-size: 1rem;">
          <button class="dropdown-item py-2" wire:click="enterMode('createProductCategory')">
            <i class="fas fa-plus-circle text-primary mr-2"></i>
            Add product category
          </button>
        </div>
      </div>
    </div>

    <div class="clearfix">
    </div>
  </div>

  <div class="row" style="margin: auto;">

    <div class="col-md-12">

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
        @livewire ('cafe-menu-list')
      @elseif ($modes['createProductFromCsvMode'])
        @if (true)
        @livewire ('cafe-menu-product-create-from-csv')
        @endif
      @endif
    </div>
    <div class="col-md-4">
    </div>
  </div>
</div>
