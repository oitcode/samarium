<div class="my-3 bg-white border">
  <h2 class="h5 m-3">
    Product vendor
  </h2>


  @if ($product->productVendor)
    <div class="p-3">
      {{ $product->productVendor->name }}
    </div>
  @else
    <div class="my-3">
      @if (! $modes['linkProductVendorMode'])
        <div class="mt-4">
          <button class="btn btn-light" wire:click="enterMode('linkProductVendorMode')">
            <i class="fas fa-plus-circle mr-1"></i>
            Link product vendor
          </button>
        </div>
      @else
        @livewire ('product.dashboard.product-vendor-link', ['product' => $product,])
      @endif
    </div>
  @endif

</div>
