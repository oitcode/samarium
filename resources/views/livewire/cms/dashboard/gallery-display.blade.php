<div>

  {{--
  |
  | Toolbar.
  |
  --}}

  <x-toolbar-component>
    <x-slot name="toolbarInfo">
      Gallery
      <i class="fas fa-angle-right mx-2"></i>
      {{ $gallery->name }}
    </x-slot>
    <x-slot name="toolbarButtons">
      <x-toolbar-button-component btnBsClass="btn-light" btnClickMethod="$refresh">
        <i class="fas fa-refresh"></i>
      </x-toolbar-button-component>
      <x-toolbar-button-component btnBsClass="btn-danger" btnClickMethod="$dispatch('exitGalleryDisplayMode')">
        <i class="fas fa-times"></i>
        Close
      </x-toolbar-button-component>
    </x-slot>
  </x-toolbar-component>

  {{--
  |
  | Flash message div.
  |
  --}}

  @if (session()->has('message'))
    @include ('partials.flash-message', ['message' => session('message'),])
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
      <button class="btn btn-light" wire:click="enterMode('addGalleryImagesMode')">
        <i class="fas fa-plus-circle mr-1"></i>
        Add images
      </button>
    </div>

    @if ($modes['addGalleryImagesMode'])
      @livewire ('cms.dashboard.gallery-add-image', ['gallery' => $gallery,])
    @else
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
    @endif
  </div>


  {{-- Settings --}}
  <div class="bg-white my-3 p-3">
    <h4 class="h5 mb-4">Settings</h4>

    {{-- Show in gallery page setitng --}}
    <div>
      <div class="font-weight-bold mb-3">
        Show in gallery page
      </div>
        <div>
          @if ($gallery->show_in_gallery_page == 'yes')
            <i class="fas fa-check-circle text-success"></i>
            Yes
          @else
            <i class="fas fa-times-circle text-danger"></i>
            No
          @endif
          <div>
            <button class="btn text-primary pl-0" wire:click="toggleGalleryPageVisibility">
              Toggle visibility
            </button>
          </div>
        </div>
    </div>

  </div>


</div>
