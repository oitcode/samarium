<div class="p-1 bg-white-rm">
  <div class="row" style="margin: auto;">
    <div class="col-md-9 bg-white o-border-radius">
      <div class="h4 o-heading text-dark my-4">
        Product information
      </div>
      <div class="row bg-white py-3-rm my-3 border-bottom-rm rounded" style="margin: auto;">
        <div class="col-md-3 o-heading p-0">
          Name
        </div>
        <div class="col-md-6">
          @if ($modes['updateProductNameMode'])
            @livewire ('product.dashboard.product-edit-name', ['product' => $product,])
          @else
          <div class="d-flex-rm justify-content-between-rm" style="">
            <span>
              {{ $product->name }}
            </span>
          </div>
          @endif
        </div>
        <div class="col-md-3 text-right">
          <button class="btn btn-light " wire:click="enterMode('updateProductNameMode')">
            <i class="fas fa-edit text-muted mr-1"></i>
          </button>
        </div>
      </div>
      <div class="row bg-white py-3-rm my-3 border-bottom-rm rounded" style="margin: auto;">
        <div class="col-md-3 o-heading p-0">
          Category
        </div>
        <div class="col-md-6">
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
        <div class="col-md-3 text-right">
          <button class="btn btn-light " wire:click="enterMode('updateProductCategoryMode')">
            <i class="fas fa-edit text-muted mr-1"></i>
          </button>
        </div>
      </div>

      <div class="row bg-white py-3-rm my-3 border-bottom-rm rounded" style="margin: auto;">
        <div class="col-md-3 o-heading p-0">
          Description
        </div>
        <div class="col-md-6">
          @if ($modes['updateProductDescriptionMode'])
            @livewire ('product.dashboard.product-edit-description', ['product' => $product,])
          @else
            <div>
              {{ $product->description }}
            </div>
          @endif
        </div>
        <div class="col-md-3 text-right">
          <button class="btn btn-light " wire:click="enterMode('updateProductDescriptionMode')">
            <i class="fas fa-edit text-muted mr-1"></i>
          </button>
        </div>
      </div>

      <div class="row bg-white py-3-rm my-3 border-bottom-rm rounded" style="margin: auto;">
        <div class="col-md-3 o-heading p-0">
          Price
        </div>
        <div class="col-md-6">
          @if ($modes['updateProductPriceMode'])
            @livewire ('product.dashboard.product-edit-price', ['product' => $product,])
          @else
            <div>
              {{ config('app.transaction_currency_symbol') }}
              {{ $product->selling_price }}
            </div>
          @endif
        </div>
        <div class="col-md-3 text-right">
          <button class="btn btn-light " wire:click="enterMode('updateProductPriceMode')">
            <i class="fas fa-edit text-muted mr-1"></i>
          </button>
        </div>
      </div>

      <div class="row bg-white py-3-rm my-3 border-bottom-rm rounded" style="margin: auto;">
        <div class="col-md-3 o-heading p-0">
          Price unit
        </div>
        <div class="col-md-6">
          @if ($modes['updateProductPriceUnitMode'])
            @livewire ('product.dashboard.product-edit-price-unit', ['product' => $product,])
          @else
            <div>
              {{ $product->selling_price_unit }}
            </div>
          @endif
        </div>
        <div class="col-md-3 text-right">
          <button class="btn btn-light " wire:click="enterMode('updateProductPriceUnitMode')">
            <i class="fas fa-edit text-muted mr-1"></i>
          </button>
        </div>
      </div>
    </div>
    <div class="col-md-3">
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
      <div class="mb-2 bg-white border-rm p-3 h-100 o-border-radius">
        <div class="d-flex justify-content-between">
          <div class="h4 o-heading text-dark">
            Image
          </div>
          <div>
            <button class="btn btn-light " wire:click="enterMode('updateProductImageMode')">
              <i class="fas fa-edit text-muted mr-1"></i>
            </button>
          </div>
        </div>
        @if ($modes['updateProductImageMode'])
          @livewire ('product.dashboard.product-edit-image', ['product' => $product,])
        @else
          <div class="my-4">
            @if ($product->image_path)
              <img class="img-fluid" src="{{ asset('storage/' . $product->image_path) }}" alt="{{ $product->name }}" style="max-height: 500px;">
            @else
              <div class="o-ola o-heading-rm">
                Product image
              </div>
            @endif
          </div>
        @endif
      </div>
    </div>
  </div>

</div>
