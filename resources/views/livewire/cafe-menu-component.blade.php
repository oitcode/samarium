<div class="p-3 p-md-0">

  {{-- Show in bigger screens --}}
  <div class="mb-3 d-none d-md-block">
    <button class="btn
        @if ($modes['createProduct'])
          btn-success
        @else
          bg-white
        @endif
        m-0 border shadow-sm badge-pill mr-3 mb-3"
        style="{{-- height: 75px; width: 150px; --}} font-size: 1.1rem;"
        wire:click="enterMode('createProduct')">
      <i class="fas fa-plus-circle mr-3"></i>
      New
    </button>

    <button class="btn
        @if ($modes['createProductCategory'])
          btn-success
        @else
          bg-white
        @endif
        m-0 border shadow-sm badge-pill mr-3 mb-3"
        style=" {{-- height: 75px; width: 150px; --}} font-size: 1.1rem;"
        wire:click="enterMode('createProductCategory')">
      <i class="fas fa-plus-circle mr-3"></i>
      Category
    </button>

    <button class="btn
        @if ($modes['list'])
          btn-success
        @else
          bg-white
        @endif
        m-0 border shadow-sm badge-pill mr-3 mb-3"
        style="{{-- height: 75px; width: 150px; --}} font-size: 1.3rem;"
        wire:click="enterMode('list')">
      <i class="fas fa-list mr-3"></i>
      List
    </button>

    <button wire:loading class="btn m-0"
        style="height: 100px; width: 225px; font-size: 1.5rem;">
      <span class="spinner-border text-info mr-3" role="status">
      </span>
    </button>


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

    <div class="col-md-8">

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
      @elseif ($modes['list'])
        @livewire ('cafe-menu-list')
    </div>
    <div class="col-md-4">
    </div>
    @endif
  </div>
</div>
