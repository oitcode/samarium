<div>

  <x-component-header>
    Theme settings
  </x-component-header>

  {{-- Flash message div --}}
  @if (session()->has('message'))
    @include ('partials.flash-message-modal', ['message' => session('message'),])
  @endif

  {{-- Top header color --}}
  @if (\App\CmsTheme::first())
  @else
    <div class="form-group">
      <label for="">Theme name</label>
      <div class="col-md-4">
        <input type="text"
            class="form-control"
            wire:model="name"
            style="">
        @error('name')
          <span class="text-danger">{{ $message }}</span>
        @enderror
      </div>
    </div>
  @endif

  <div class="p-2 bg-white border">
    <h2 class="h4 mt-4 my-3">
      Header
    </h2>

    {{-- Top header bg color --}}
    <div class="form-row">
      <div class="col-md-4">
        <label class="font-weight-bold">Top header background color</label>
      </div>
      <div class="col-md-8">
        <input type="text"
            class="form-control"
            wire:model="top_header_bg_color"
            style="">
        @error('top_header_bg_color')
          <span class="text-danger">{{ $message }}</span>
        @enderror
      </div>
    </div>

    {{-- Top header text color --}}

    <div class="form-row">
      <div class="col-md-4">
        <label class="font-weight-bold">Top header text color</label>
      </div>
      <div class="col-md-8">
        <input type="text"
            class="form-control"
            wire:model="top_header_text_color"
            style="">
        @error('top_header_text_color')
          <span class="text-danger">{{ $message }}</span>
        @enderror
      </div>
    </div>

  <h2 class="h4 mt-4 my-3">
    Navigation menu
  </h2>
  {{-- Nav menu bg color --}}
  <div class="form-row">
    <div class="col-md-4">
      <label class="font-weight-bold">Nav menu background color</label>
    </div>
    <div class="col-md-8">
      <input type="text"
          class="form-control"
          wire:model="nav_menu_bg_color"
          style="">
      @error('nav_menu_bg_color')
        <span class="text-danger">{{ $message }}</span>
      @enderror
    </div>
  </div>

  {{-- Nav menu text color --}}
  <div class="form-row">
    <div class="col-md-4">
      <label class="font-weight-bold">Nav menu text color</label>
    </div>
    <div class="col-md-8">
      <input type="text"
          class="form-control"
          wire:model="nav_menu_text_color"
          style="">
      @error('nav_menu_text_color')
        <span class="text-danger">{{ $message }}</span>
      @enderror
    </div>
  </div>


  <h2 class="h4 mt-4 my-3">
    Ascent
  </h2>
  {{-- Ascent bg color --}}
  <div class="form-row">
    <div class="col-md-4">
      <label class="font-weight-bold">Ascent background color</label>
    </div>
    <div class="col-md-8">
      <input type="text"
          class="form-control"
          wire:model="ascent_bg_color"
          style="">
      @error('ascent_bg_color')
        <span class="text-danger">{{ $message }}</span>
      @enderror
    </div>
  </div>

  {{-- Ascent text color --}}
  <div class="form-row">
    <div class="col-md-4">
      <label class="font-weight-bold">Ascent text color</label>
    </div>
    <div class="col-md-8">
      <input type="text"
          class="form-control"
          wire:model="ascent_text_color"
          style="">
      @error('ascent_text_color')
        <span class="text-danger">{{ $message }}</span>
      @enderror
    </div>
  </div>

  <h2 class="h4 mt-4 my-3">
    Footer
  </h2>

  {{-- Footer background color --}}
  <div class="form-row">
    <div class="col-md-4">
      <label class="font-weight-bold">Footer background color</label>
    </div>
    <div class="col-md-8">
      <input type="text"
          class="form-control"
          wire:model="footer_bg_color"
          style="">
      @error('footer_bg_color')
        <span class="text-danger">{{ $message }}</span>
      @enderror
    </div>
  </div>

  {{-- Footer text color --}}
  <div class="form-row">
    <div class="col-md-4">
      <label class="font-weight-bold">Footer text color</label>
    </div>
    <div class="col-md-8">
      <input type="text"
          class="form-control"
          wire:model="footer_text_color"
          style="">
      @error('footer_text_color')
        <span class="text-danger">{{ $message }}</span>
      @enderror
    </div>
  </div>

  <hr />

  {{-- Heading color --}}
  <div class="form-row">
    <div class="col-md-4">
      <label class="font-weight-bold">Heading color</label>
    </div>
    <div class="col-md-8">
      <input type="text"
          class="form-control"
          wire:model="heading_color"
          style="">
      @error('heading_color')
        <span class="text-danger">{{ $message }}</span>
      @enderror
    </div>
  </div>

  {{-- Hero image --}}
  <div class="form-group mt-4 mb-3">
    <label class="font-weight-bold">Featured image</label>
    @if (\App\CmsTheme::first() && \App\CmsTheme::first()->hero_image_path)
      <div class="d-flex justify-content-start mb-3">
        <img src="{{ asset('storage/' . \App\CmsTheme::first()->hero_image_path) }}" class="img-fluid" style="height: 50px;">
      </div>
      <div class="mx-4-rm">
        <button class="btn btn-light" wire:click="enterMode('updateFeaturedImageMode')">
          <i class="fas fa-pencil-alt mr-1"></i>
          Change
        </button>
      </div>
    @else
      <button class="btn btn-light" wire:click="enterMode('updateFeaturedImageMode')">
        <i class="fas fa-pencil-alt mr-1"></i>
        Set
      </button>
    @endif

  </div>

  @if ($modes['updateFeaturedImageMode'])
    <div class="my-4">
      <div class="d-flex">
        <div class="mr-3">
          <button class="btn btn-primary" wire:click="enterMode('updateFeaturedImageFromNewUploadMode')">
            Upload
          </button>
        </div>
        <div class="mr-3">
          <button class="btn btn-success" wire:click="enterMode('updateFeaturedImageFromLibraryMode')">
            Media library
          </button>
        </div>
        <div class="mr-3">
          <button class="btn btn-danger" wire:click="exitMode('updateFeaturedImageMode')">
            Cancel
          </button>
        </div>
      </div>
    </div>
  @endif

  @if ($modes['updateFeaturedImageFromNewUploadMode'])
    <div class="my-4 p-3 bg-white border">
      Upload new image
      <div>
        <input type="file" class="form-control" wire:model.live="hero_image">
        @error('hero_image') <span class="text-danger">{{ $message }}</span> @enderror
      </div>
      <div>
        <button class="btn btn-danger" wire:click="exitMode('updateFeaturedImageFromNewUploadMode')">
          Cancel
        </button>
        <button wire:loading class="btn">
          <span class="spinner-border text-info mr-3" role="status">
          </span>
        </button>
      </div>
    </div>
  @endif

  @if ($modes['updateFeaturedImageFromLibraryMode'])
    @livewire ('cms.dashboard.media-select-image-component')
  @endif

  <div class="my-3 mt-4">
    @if (\App\CmsTheme::first())
      @include ('partials.button-update')
    @else
      @include ('partials.button-store')
    @endif
  </div>
  </div>
</div>
