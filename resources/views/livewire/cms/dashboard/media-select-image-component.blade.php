<div class="my-4 p-3 bg-white border">

  Choose image from library
  {{-- Show all images from library --}}
  <div class="my-3">
    <div class="row">
      <div class="col-md-8">
        <div class="row">
          @foreach ($galleryImages as $galleryImage)
            <div class="col-md-3 p-3">
              @if ($modes['imageSelectedMode'])
                @if ($imageSelected->gallery_image_id == $galleryImage->gallery_image_id)
                  <img src="{{ asset('storage/' . $galleryImage->image_path) }}"
                      class="img-fluid shadow-lg"
                      style="height: 100px; border: 5px solid green;"
                      role="button"
                      wire:click="selectImage({{ $galleryImage }})">
                @else
                  <img src="{{ asset('storage/' . $galleryImage->image_path) }}"
                      class="img-fluid"
                      style="height: 100px;"
                      role="button"
                      wire:click="selectImage({{ $galleryImage }})">
                @endif
              @else
                <img src="{{ asset('storage/' . $galleryImage->image_path) }}"
                    class="img-fluid"
                    style="height: 100px;"
                    role="button"
                    wire:click="selectImage({{ $galleryImage }})">
              @endif
            </div>
          @endforeach
        </div>
      </div>
      <div class="col-md-4 border-left bg-light">
        @if ($modes['imageSelectedMode'])
          <div>
            <img src="{{ asset('storage/' . $imageSelected->image_path) }}" class="img-fluid">
          </div>
        @endif
      </div>
    </div>
  </div>

</div>
