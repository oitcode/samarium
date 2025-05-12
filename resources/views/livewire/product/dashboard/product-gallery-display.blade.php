<div>

  @if (true)
    <div class="mx-2 mb-3">
      <button class="btn btn-light m-0 border"
          style="min-width: 200px;"
          wire:click="enterMode('addImages')">
        <i class="fas fa-plus-circle mr-1"></i>
        Add image
      </button>
    </div>
  @endif

  @if ($modes['addImages'])
    @livewire ('product.dashboard.product-gallery-add-images', ['gallery' => $product->gallery,])
  @endif

  <div class="row bg-white" style="margin: auto;">
    @foreach ($product->gallery->galleryImages()->orderBy('position', 'asc')->get() as $galleryImage)
      <div class="col-md-2 mb-3">
        <img src="{{ asset('storage/' . $galleryImage->image_path) }}" style="max-height:100px; max-width:100ps;">
        <div>
          <button class="btn mr-3" wire:click="deleteImageFromGallery({{ $galleryImage->gallery_image_id }})">
            <i class="fas fa-trash text-muted"></i>
          </button>
          <button class="btn mr-3" wire:click="movePositionUp({{ $galleryImage->gallery_image_id }})">
            <i class="fas fa-arrow-left text-muted"></i>
          </button>
          <button class="btn mr-3" wire:click="movePositionDown({{ $galleryImage->gallery_image_id }})">
            <i class="fas fa-arrow-right text-muted"></i>
          </button>
        </div>
      </div>
    @endforeach
  </div>

</div>
