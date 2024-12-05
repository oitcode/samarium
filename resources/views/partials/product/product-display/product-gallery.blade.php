<div class="my-3 bg-white border">
  <h2 class="h5 m-3">
    Product gallery
  </h2>


  @if ($product->gallery)
    <div class="my-3">
      <button class="btn btn-light" wire:click="enterMode('updateProductUpdateProductGalleryMode')">
        <i class="fas fa-pencil-alt mr-1"></i>
        Edit gallery
      </button>
      @livewire ('product.dashboard.product-gallery-display', ['product' => $product,])
    </div>
  @else
    <div class="my-3">
      @if (! $modes['createProductGalleryMode'])
        <span class="px-3 my-3 text-secondary">
          No gallery
        </span>
        <div class="mt-4">
          <button class="btn btn-light" wire:click="enterMode('createProductGalleryMode')">
            <i class="fas fa-plus-circle mr-1"></i>
            Add gallery
          </button>
        </div>
      @else
        @livewire ('product.dashboard.product-gallery-create', ['product' => $product,])
      @endif
    </div>
  @endif

</div>
