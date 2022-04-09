<div class="p-2">
  <div class="mb-3">
    <h3 class="h4">{{ $gallery->name }}</h3>
    <div class="">
      <small>
        <span class="text-secondary mr-1">
          Gallery ID:
        </span>
        {{ $gallery->gallery_id }}

        &nbsp;&nbsp;&nbsp;&nbsp;

        <span class="text-secondary mr-1">
          Published:
        </span>
        {{ $gallery->created_at->toDateString() }}

        &nbsp;&nbsp;&nbsp;&nbsp;

        <span class="text-secondary mr-1">
          Last Updated:
        </span>
        {{ $gallery->updated_at->toDateString() }}

      </small>
    </div>
  </div>

  <h4 class="h5">Images</h4>

  <div class="row">
    @foreach ($gallery->galleryImages as $galleryImage)
      <div class="col-md-3 mb-3">
        <img src="{{ asset('storage/' . $galleryImage->image_path) }}" style="max-height:100px; max-width:100ps;">
      </div>
    @endforeach
  </div>
</div>
