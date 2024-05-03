<div class="my-3 bg-white border">
  <h2 class="h5 m-3">
    Product video
  </h2>

  @if ($product->video_link)
    <div class="p-3">
      Video set
    </div>
  @else
    @if ($modes['updateProductVideoMode'])
      @livewire ('product.dashboard.product-edit-video-link', ['product' => $product,])
    @else
      <div class="py-3">
        <button class="btn btn-light" wire:click="enterMode('updateProductVideoMode')">
          <i class="fas fa-plus-circle mr-1"></i>
          Add video
        </button>
      </div>
    @endif
  @endif

</div>
