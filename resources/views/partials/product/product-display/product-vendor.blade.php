<div class="my-3 bg-white border o-border-radius">
  <div class="d-flex justify-content-between p-3">
    <h2 class="h6 o-heading">
      Product vendor
    </h2>
    <div>
      <x-spinner-component wireTarget="enterMode('linkProductVendorMode')">
      </x-spinner-component >

      <button class="btn btn-light m-0 border o-linear-gradient text-white o-border-radius-sm"
          style="min-width: 200px;"
          wire:click="enterMode('linkProductVendorMode')">
        <i class="fas fa-plus-circle mr-1"></i>
        Link product vendor
      </button>
    </div>
  </div>

  @if ($product->productVendor)
    <div class="p-3">
      {{ $product->productVendor->name }}
    </div>
  @else
    <div class="my-3">
      @if (! $modes['linkProductVendorMode'])
      @else
        @livewire ('product.dashboard.product-vendor-link', ['product' => $product,])
      @endif
    </div>
  @endif

</div>
