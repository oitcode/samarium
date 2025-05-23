<div class="my-3 bg-white border">
  <div class="d-flex justify-content-between p-3">
    <h2 class="h6 font-weight-bold text-secondary-rm" style="font-weight: 900; font-family: arial; color: #123;">
      Product vendor
    </h2>
    <div class="mb-3-rm">
      <x-spinner-component wireTarget="enterMode('linkProductVendorMode')">
      </x-spinner-component >

      <button class="btn btn-light m-0 border"
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
