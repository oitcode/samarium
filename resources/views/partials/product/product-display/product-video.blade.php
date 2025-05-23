<div class="my-3 bg-white border">
  <div class="d-flex justify-content-between p-3">
    <h2 class="h6 o-heading">
      Product video
    </h2>
    <div class="mb-3-rm">
      @include ('partials.dashboard.spinner-button', ['wireTarget' => "enterMode('updateProductVideoMode')"])

      <button class="btn btn-light m-0 border"
          style="min-width: 200px;"
          wire:click="enterMode('updateProductVideoMode')">
        <i class="fas fa-plus-circle mr-1"></i>
        Add video
      </button>
    </div>
  </div>

  @if ($product->video_link)
    <div class="p-3">
      Video set
    </div>
  @else
    @if ($modes['updateProductVideoMode'])
      @livewire ('product.dashboard.product-edit-video-link', ['product' => $product,])
    @endif
  @endif

</div>
