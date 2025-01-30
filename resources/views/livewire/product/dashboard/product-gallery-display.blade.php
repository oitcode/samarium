<div>

  <div class="row bg-white" style="margin: auto;">
    @foreach ($product->gallery->galleryImages()->orderBy('position', 'asc')->get() as $galleryImage)
      <div class="col-md-2 mb-3">
        <img src="{{ asset('storage/' . $galleryImage->image_path) }}" style="max-height:100px; max-width:100ps;">
      </div>
    @endforeach
  </div>

</div>
