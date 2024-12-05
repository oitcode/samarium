<div class="row border-rm bg-white-rm" style="margin: auto;">


  {{-- Product info --}}
  <div class="col-md-9 p-0 pr-2">

      <div class="mb-2 bg-white border p-3">
        <div class="d-flex justify-content-between">
          <div>
            Product Name
          </div>
          <div>
            <button class="btn btn-light text-primary" wire:click="enterMode('updateProductNameMode')">
              Edit
            </button>
          </div>
        </div>
        @if ($modes['updateProductNameMode'])
          @livewire ('product.dashboard.product-edit-name', ['product' => $product,])
        @else
          <div class="d-flex justify-content-between my-0">
            {{-- Product name --}}
            <div class="d-flex">
              <div>
                <h1 class="h5">
                  {{ $product->name }}
                </h1>
              </div>
            </div>
          </div>
        @endif
      </div>

      <div class="mb-2 bg-white border p-3">
        <div class="d-flex justify-content-between">
          <div>
            Category
          </div>
          <div>
            <button class="btn btn-light text-primary" wire:click="enterMode('updateProductCategoryMode')">
              Edit
            </button>
          </div>
        </div>
        @if ($modes['updateProductCategoryMode'])
          @livewire ('product.dashboard.product-edit-category', ['product' => $product,])
        @else
        <div class="d-flex justify-content-between" style="">
          <span>
            {{ $product->productCategory->name }}
          </span>
        </div>
        @endif
      </div>

      <div class="mb-2 bg-white border p-3">
        <div class="d-flex justify-content-between">
          <div>
            Description
          </div>
          <div>
            <button class="btn btn-light text-primary" wire:click="enterMode('updateProductDescriptionMode')">
              Edit
            </button>
          </div>
        </div>
        @if ($modes['updateProductDescriptionMode'])
          @livewire ('product.dashboard.product-edit-description', ['product' => $product,])
        @else
          <div class="d-flex justify-content-between font-weight-bold">
            {{ $product->description }}
          </div>
        @endif
      </div>

      <div class="mb-2 bg-white border p-3">
        <div class="d-flex justify-content-between">
          <div>
            Price
          </div>
          <div>
            <button class="btn btn-light text-primary" wire:click="enterMode('updateProductPriceMode')">
              Edit
            </button>
          </div>
        </div>
        @if ($modes['updateProductPriceMode'])
          @livewire ('product.dashboard.product-edit-price', ['product' => $product,])
        @else
          <div class="d-flex justify-content-between font-weight-bold">
            {{ $product->selling_price }}
          </div>
        @endif
      </div>

      @if ($product->baseProduct)
        <div class="mb-3">
          <h2 class="h6 font-weight-bold">
            Base product
          </h2>
          <div>
          {{ $product->baseProduct->name }}
          </div>
        </div>

        <div class="mb-3">
          <h2 class="h6 font-weight-bold">
            Inventory unit consumption
          </h2>
          <div>
          {{ $product->inventory_unit_consumption }}
          {{ $product->baseProduct->inventory_unit }}
          </div>
        </div>
      @endif

  </div>

  {{-- Product image --}}
  <div class="col-md-3 bg-light">
    <div class="d-flex justify-content-center h-100">
      <div class="d-flex flex-column justify-content-center h-100">
        {{-- Product media --}}
        <div>
          @if ($modes['updateProductImageMode'])
            @livewire ('product.dashboard.product-edit-image', ['product' => $product,])
          @else
            <div>
              <div class="my-4">
                <button class="btn btn-light" wire:click="enterMode('updateProductImageMode')">
                  <i class="fas fa-pencil-alt"></i>
                </button>
              </div>
            </div>
            @if ($product->image_path)
              <img src="{{ asset('storage/' . $product->image_path) }}" class="mr-3" style="width: 200px; height: 200px;">
            @else
              <i class="fas fa-dice-d6 text-muted fa-8x"></i>
            @endif
          @endif
        </div>
      </div>
    </div>
  </div>
</div>
