<div class="p-3 bg-white border">
  <div class="mb-4">
    @if (\App\CmsTheme::first())
      <button class="btn btn-success badge-pill p-2 px-3" wire:click="update">
        <i class="fas fa-save mr-1"></i>
        Update
      </button>
    @else
      <button class="btn btn-success" wire:click="store">
        Save
      </button>
    @endif
  </div>

  @if (session()->has('message'))
    {{-- Flash message div --}}
    <div class="p-2">
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="fas fa-check-circle mr-3"></i>
        {{ session('message') }}
        <button type="button" class="close text-white" data-dismiss="alert" aria-label="Close">
          <span class="text-success" aria-hidden="true">&times;</span>
        </button>
      </div>
    </div>
  @endif

  <h2 class="h5 text-secondary">
    Theme settings
  </h2>

  {{-- Top header color --}}
  @if (\App\CmsTheme::first())
  @else
    <div class="form-group">
      <label for="">Theme name</label>
      <input type="text"
          class="form-control"
          wire:model.defer="name"
          style="">
      @error('name')
        <span class="text-danger">{{ $message }}</span>
      @enderror
    </div>
  @endif

  {{-- Top header bg color --}}
  <div class="form-group">
    <label for="">Top header background color</label>
    <input type="text"
        class="form-control"
        wire:model.defer="top_header_bg_color"
        style="">
    @error('top_header_bg_color')
      <span class="text-danger">{{ $message }}</span>
    @enderror
  </div>

  {{-- Top header text color --}}
  <div class="form-group">
    <label for="">Top header text color</label>
    <input type="text"
        class="form-control"
        wire:model.defer="top_header_text_color"
        style="">
    @error('top_header_text_color')
      <span class="text-danger">{{ $message }}</span>
    @enderror
  </div>

  {{-- Footer background color --}}
  <div class="form-group">
    <label for="">Footer background color</label>
    <input type="text"
        class="form-control"
        wire:model.defer="footer_bg_color"
        style="">
    @error('footer_bg_color')
      <span class="text-danger">{{ $message }}</span>
    @enderror
  </div>

  {{-- Footer text color --}}
  <div class="form-group">
    <label for="">Footer text color</label>
    <input type="text"
        class="form-control"
        wire:model.defer="footer_text_color"
        style="">
    @error('footer_text_color')
      <span class="text-danger">{{ $message }}</span>
    @enderror
  </div>

  {{-- Ascent bg color --}}
  <div class="form-group">
    <label for="">Ascent background color</label>
    <input type="text"
        class="form-control"
        wire:model.defer="ascent_bg_color"
        style="">
    @error('ascent_bg_color')
      <span class="text-danger">{{ $message }}</span>
    @enderror
  </div>

  {{-- Ascent text color --}}
  <div class="form-group">
    <label for="">Ascent text color</label>
    <input type="text"
        class="form-control"
        wire:model.defer="ascent_text_color"
        style="">
    @error('ascent_text_color')
      <span class="text-danger">{{ $message }}</span>
    @enderror
  </div>

  {{-- Heading color --}}
  <div class="form-group">
    <label for="">Heading color</label>
    <input type="text"
        class="form-control"
        wire:model.defer="heading_color"
        style="">
    @error('heading_color')
      <span class="text-danger">{{ $message }}</span>
    @enderror
  </div>

  {{-- Hero image --}}
  <div class="form-group">
    <label for="">Hero image</label>
    @if (\App\CmsTheme::first() && \App\CmsTheme::first()->hero_image_path)
      <div class="d-flex justify-content-start mb-3">
        <img src="{{ asset('storage/' . \App\CmsTheme::first()->hero_image_path) }}" class="img-fluid" style="height: 50px;">
      </div>
    @endif
    <input type="file" class="form-control" wire:model="hero_image">
    @error('hero_image')
      <span class="text-danger">{{ $message }}</span>
    @enderror
  </div>

  <div class="my-3 mt-4">
    @if (\App\CmsTheme::first())
      <button class="btn btn-success badge-pill p-2 px-3" wire:click="update">
        <i class="fas fa-save mr-1"></i>
        Update
      </button>
    @else
      <button class="btn btn-success" wire:click="store">
        Save
      </button>
    @endif
  </div>
</div>
