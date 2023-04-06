<div class="p-2 bg-white-rm">

  <!-- Flash message div -->
  @if (session()->has('message'))
    <div class="p-2">
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="fas fa-check-circle mr-3"></i>
        {{ session('message') }}
        <button type="button" class="close text-white" data-dismiss="alert" aria-label="Close">
          <span class="text-danger" aria-hidden="true">&times;</span>
        </button>
      </div>
    </div>
  @endif

  <div class="mb-3 p-3 bg-white">
    <div class="d-flex">
      @if ($modes['updateGalleryNameMode'])
        @livewire ('cms.dashboard.gallery-update-name', ['gallery' => $gallery,])
      @else
        <h3 class="h4">{{ $gallery->name }}</h3>
        <button class="btn btn-light mx-5" wire:click="enterMode('updateGalleryNameMode')">
          <i class="fas fa-pencil-alt"></i>
        </button>
      @endif
    </div>
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

        <i class="fas fa-refresh fa-2x-rm mx-5" wire:click="$refresh" role="button"></i>

      </small>
    </div>
  </div>

  <div class="bg-white">
    <h4 class="h5 p-3">Images</h4>

    <div class="mb-3 px-2">
      <button class="btn btn-light">
        <i class="fas fa-plus-circle mr-1"></i>
        Add images
      </button>
    </div>

    <div class="row bg-white" style="margin: auto;">
      @foreach ($gallery->galleryImages()->orderBy('position', 'asc')->get() as $galleryImage)
        <div class="col-md-3 mb-3">
          <img src="{{ asset('storage/' . $galleryImage->image_path) }}" style="max-height:100px; max-width:100ps;">
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
        </div>
      @endforeach
    </div>
  </div>
</div>
