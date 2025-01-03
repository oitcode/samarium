<div class="row-rm border-rm bg-white-rm">


  {{-- Product info --}}
  <div class="col-md-12-rm p-0">

      <div class="mb-2 bg-white border p-3">
        <div class="d-flex justify-content-between">
          <div class="o-heading">
            Product Name
          </div>
          <div>
            <button class="btn btn-primary" wire:click="enterMode('updateProductNameMode')">
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
          <div class="o-heading">
            Category
          </div>
          <div>
            <button class="btn btn-primary" wire:click="enterMode('updateProductCategoryMode')">
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
          <div class="o-heading">
            Description
          </div>
          <div>
            <button class="btn btn-primary" wire:click="enterMode('updateProductDescriptionMode')">
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
          <div class="o-heading">
            Price
          </div>
          <div>
            <button class="btn btn-primary" wire:click="enterMode('updateProductPriceMode')">
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
          <h2 class="h6 o-heading">
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
  <div class="col-md-12-rm mb-2 bg-white border p-3">
    <div class="d-flex justify-content-between">
      <div class="o-heading">
        Image
      </div>
      <div>
        <button class="btn btn-primary" wire:click="enterMode('updateProductImageMode')">
          Edit
        </button>
      </div>
    </div>
    @if ($modes['updateProductDescriptionMode'])
      @livewire ('product.dashboard.product-edit-image', ['product' => $product,])
    @else
      <div class="my-4">
        @if ($product->image_path)
          <img src="{{ asset('storage/' . $product->image_path) }}" class="mr-3" style="width: 200px; height: 200px;">
        @else
          <i class="fas fa-dice-d6 text-muted fa-8x"></i>
        @endif
      </div>
    @endif
  </div>
</div>
