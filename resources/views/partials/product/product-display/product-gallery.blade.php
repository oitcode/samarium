<div class="my-3 bg-white border o-border-radius">
  <div class="d-flex justify-content-between p-3">
    <h2 class="h6 font-weight-bold" style="font-weight: 900; font-family: arial; color: #123;">
      Product gallery
    </h2>
    <div>
      <x-spinner-component wireTarget="enterMode('createProductGalleryMode')">
      </x-spinner-component >

      @if (! $product->gallery)
        <button class="btn btn-light m-0 border o-linear-gradient text-white o-border-radius-sm"
            style="min-width: 200px;"
            wire:click="enterMode('createProductGalleryMode')">
          <i class="fas fa-plus-circle mr-1"></i>
          Add gallery
        </button>
      @endif
    </div>
  </div>

  @if ($product->gallery)
    <div class="my-3">
      @livewire ('product.dashboard.product-gallery-display', ['product' => $product,])
    </div>
  @else
    <div class="my-3">
      @if (! $modes['createProductGalleryMode'])
        <span class="px-3 my-3 text-secondary">
          No gallery
        </span>
      @else
        @livewire ('product.dashboard.product-gallery-create', ['product' => $product,])
      @endif
    </div>
  @endif
</div>
