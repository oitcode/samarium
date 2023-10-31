<div>


      <div class="row bg-white" style="margin: auto;">
        @foreach ($product->gallery->galleryImages()->orderBy('position', 'asc')->get() as $galleryImage)
          <div class="col-md-2 mb-3">
            <img src="{{ asset('storage/' . $galleryImage->image_path) }}" style="max-height:100px; max-width:100ps;">
            @if (false)
            <div>
              <button class="btn mr-3" wire:click="deleteImageFromGallery({{ $galleryImage }})">
                <i class="fas fa-trash text-muted"></i>
              </button>
              <button class="btn mr-3" wire:click="movePositionUp({{ $galleryImage }})">
                <i class="fas fa-arrow-left text-muted"></i>
              </button>
              <button class="btn mr-3" wire:click="movePositionDown({{ $galleryImage }})">
                <i class="fas fa-arrow-right text-muted"></i>
              </button>
            </div>
            @endif
          </div>
        @endforeach
      </div>


</div>
