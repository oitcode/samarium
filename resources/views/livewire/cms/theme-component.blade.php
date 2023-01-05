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

  {{-- Top header color --}}
  <div class="form-group">
    <label for="">Top header color</label>
    <input type="text"
        class="form-control"
        wire:model.defer="top_header_color"
        style="font-size: 1.3rem; max-width: 500px;">
    @error('top_header_color')
      <span class="text-danger">{{ $message }}</span>
    @enderror
  </div>

  {{-- Footer color --}}
  <div class="form-group">
    <label for="">Footer color</label>
    <input type="text"
        class="form-control"
        wire:model.defer="footer_color"
        style="font-size: 1.3rem; max-width: 500px;">
    @error('footer_color')
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

  <button class="btn btn-primary" wire:click="store">
    Save
  </button>
</div>
