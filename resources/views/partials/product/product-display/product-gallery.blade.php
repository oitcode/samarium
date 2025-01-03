<div class="my-3 bg-white border">
  <div class="d-flex justify-content-between p-3">
    <h2 class="h6 font-weight-bold text-secondary-rm" style="font-weight: 900; font-family: arial; color: #123;">
      Product gallery
    </h2>
    <div class="mb-3-rm">
      <button wire:loading class="btn m-0">
        <span class="spinner-border text-info mr-3" role="status">
        </span>
      </button>

      <button class="btn btn-primary m-0 border"
          style="min-width: 200px;"
          wire:click="enterMode('createProductGalleryMode')">
        <i class="fas fa-plus-circle mr-1"></i>
        Add gallery
      </button>
    </div>
  </div>


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
      @else
        @livewire ('product.dashboard.product-gallery-create', ['product' => $product,])
      @endif
    </div>
  @endif

</div>
