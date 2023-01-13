<div class="p-3 bg-white border">
  <h2 class="h3">
    Theme settings
  </h2>

  {{-- Top header color --}}
  <div class="form-group">
    <label for="">Theme name</label>
    <input type="text"
        class="form-control"
        wire:model.defer="name"
        style="font-size: 1.3rem; max-width: 500px;">
    @error('name')
      <span class="text-danger">{{ $message }}</span>
    @enderror
  </div>

  {{-- Top header bg color --}}
  <div class="form-group">
    <label for="">Top header background color</label>
    <input type="text"
        class="form-control"
        wire:model.defer="top_header_bg_color"
        style="font-size: 1.3rem; max-width: 500px;">
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
        style="font-size: 1.3rem; max-width: 500px;">
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
        style="font-size: 1.3rem; max-width: 500px;">
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
        style="font-size: 1.3rem; max-width: 500px;">
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
        style="font-size: 1.3rem; max-width: 500px;">
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
        style="font-size: 1.3rem; max-width: 500px;">
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
        style="font-size: 1.3rem; max-width: 500px;">
    @error('heading_color')
      <span class="text-danger">{{ $message }}</span>
    @enderror
  </div>

  {{-- Hero image --}}
  <div class="form-group">
    <label for="">Hero image</label>
    <input type="file" class="form-control" wire:model="hero_image">
    @error('hero_image')
      <span class="text-danger">{{ $message }}</span>
    @enderror
  </div>

  @if (\App\CmsTheme::first())
    <button class="btn btn-primary" wire:click="update">
      Update
    </button>
  @else
    <button class="btn btn-primary" wire:click="store">
      Save
    </button>
  @endif
</div>
