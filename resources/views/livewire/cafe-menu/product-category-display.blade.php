<div>


  {{-- Breadcrumb --}}
  <h1 class="h5 my-2 py-2">
    Products

    <i class="fas fa-angle-right mx-2"></i>
    {{ $productCategory->name }}
  </h1>


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


  {{-- Top tool bar --}}
  <div>
    <div>
      <div class="mt-0 p-2 d-flex justify-content-between border"
          style="background-color: #dadada;">

        <div>
        </div>

        <div>
          <button class="btn btn-light" wire:click="$refresh">
            <i class="fas fa-refresh"></i>
          </button>

          <button class="btn btn-light" wire:click="$emit('productCategoryDisplayCancelled')">
            <i class="fas fa-times"></i>
          </button>
        </div>

      </div>
    </div>
  </div>


  <div>
    <div>
      <div class="p-3 bg-light text-secondary font-weight-bold pt-3 pb-1">
        Product Category Name
      </div>
      @if ($modes['updateProductCategoryNameMode'])
        <div>
          @livewire ('cafe-menu.product-category.product-category-edit-name', ['productCategory' => $productCategory,])
        </div>
      @else
        <div class="d-flex justify-content-between">
          {{-- Product name --}}
          <div class="flex-grow-1">
            <div class="bg-white h-100">
              <h1 class="h5 p-3">
                {{ $productCategory->name }}
              </h1>
            </div>
          </div>
          <div>
            <button class="btn btn-light h-100" wire:click="enterMode('updateProductCategoryNameMode')">
              <i class="fas fa-pencil-alt"></i>
            </button>
          </div>
        </div>
      @endif
    </div>
    @if (true)
    <hr class="m-0 p-0"/>
    @endif

  </div>

  <div class="my-3">
    <div class="p-3 bg-light text-secondary font-weight-bold pt-3 pb-1">
      Product Category Image
    </div>
    @if ($modes['updateProductCategoryImageMode'])
      <div>
        @livewire ('cafe-menu.product-category.product-category-edit-image', ['productCategory' => $productCategory,])
      </div>
    @else
      <div class="d-flex justify-content-between bg-white">
        {{-- Product image --}}
        <div class="flex-grow-1">
          @if ($productCategory->image_path)
            <img src="{{ asset('storage/' . $productCategory->image_path) }}" class="mr-3" style="width: 200px; height: 200px;">
          @else
            <div class="p-3">
              <i class="fas fa-th text-muted fa-8x"></i>
            </div>
          @endif
        </div>
        <div>
          <button class="btn btn-light h-100" wire:click="enterMode('updateProductCategoryImageMode')">
            <i class="fas fa-pencil-alt"></i>
          </button>
        </div>
      </div>
    @endif
  </div>

  <div>
    <div>
      <div class="p-3 bg-light text-secondary font-weight-bold pt-3 pb-1">
        Number of products
      </div>
      <div class="d-flex justify-content-between">
        {{-- Product name --}}
        <div class="flex-grow-1">
          <div class="bg-white h-100">
            <h1 class="h5 p-3">
              {{ count($productCategory->products) }}
            </h1>
          </div>
        </div>
      </div>
    </div>
    @if (true)
    <hr class="m-0 p-0"/>
    @endif

  </div>


</div>
