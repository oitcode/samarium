<div>
  <div class="row bg-white py-3 border-bottom" style="margin: auto;">
    <div class="col-md-3 o-heading">
      Product name
    </div>
    <div class="col-md-3">
      @if ($modes['updateProductNameMode'])
        @livewire ('product.dashboard.product-edit-name', ['product' => $product,])
      @else
        <div class="d-flex justify-content-between my-0">
          {{-- Product name --}}
          <div class="d-flex">
            <div>
              <h1 class="h6">
                {{ $product->name }}
              </h1>
            </div>
          </div>
        </div>
      @endif
    </div>
    <div class="col-md-6 text-right">
      <button class="btn btn-listh text-primary" wire:click="enterMode('updateProductNameMode')">
        Edit
      </button>
    </div>
  </div>

  <div class="row bg-white py-3 border-bottom" style="margin: auto;">
    <div class="col-md-3 o-heading">
      Category
    </div>
    <div class="col-md-3">
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
    <div class="col-md-6 text-right">
      <button class="btn btn-listh text-primary" wire:click="enterMode('updateProductCategoryMode')">
        Edit
      </button>
    </div>
  </div>

  <div class="row bg-white py-3 border-bottom" style="margin: auto;">
    <div class="col-md-3 o-heading">
      Description
    </div>
    <div class="col-md-3">
      @if ($modes['updateProductDescriptionMode'])
        @livewire ('product.dashboard.product-edit-description', ['product' => $product,])
      @else
        <div>
          {{ $product->description }}
        </div>
      @endif
    </div>
    <div class="col-md-6 text-right">
      <button class="btn btn-listh text-primary" wire:click="enterMode('updateProductDescriptionMode')">
        Edit
      </button>
    </div>
  </div>

  <div class="row bg-white py-3 border-bottom" style="margin: auto;">
    <div class="col-md-3 o-heading">
      Price
    </div>
    <div class="col-md-3">
      @if ($modes['updateProductPriceMode'])
        @livewire ('product.dashboard.product-edit-price', ['product' => $product,])
      @else
        <div>
          {{ $product->selling_price }}
        </div>
      @endif
    </div>
    <div class="col-md-6 text-right">
      <button class="btn btn-listh text-primary" wire:click="enterMode('updateProductPriceMode')">
        Edit
      </button>
    </div>
  </div>

  {{-- Product info --}}
  <div class="p-0">
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
  <div class="mb-2 bg-white border p-3">
    <div class="d-flex justify-content-between">
      <div class="o-heading">
        Image
      </div>
      <div>
        <button class="btn btn-listh text-primary" wire:click="enterMode('updateProductImageMode')">
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
