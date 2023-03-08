<div class="container-fluid">
  <div class="container py-3">
    @if ($galleries != null && count($galleries) > 0)
        @foreach ($galleries as $gallery)
          <h3>{{ $gallery->name }}</h3>
          <div class="row">
          @foreach ($gallery->galleryImages as $galleryImage)
            <div class="col-md-3 mb-3 p-3 border">
              <img src="{{ asset('storage/' . $galleryImage->image_path) }}" class="img-fluid">
            </div>
          @endforeach
          </div>
        @endforeach
      </div>
    @else
      <span class="text-danger">
        No gallery to show
      </span>
    @endif
  </div>
</div>
