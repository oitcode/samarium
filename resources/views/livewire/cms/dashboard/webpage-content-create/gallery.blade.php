<div>
  <h2 class="h4 mb-3">
    Gallery
  </h2>

  <div class="form-group">
    <label>Select Gallery</label>
    <select class="form-control" wire:model="gallery_id">
      @foreach (\App\Gallery::all() as $gallery)
        <option value="{{ $gallery->gallery_id }}">{{ $gallery->name }}</option>
      @endforeach
    </select>
    @error('gallery_id') <span class="text-danger">{{ $message }}</span> @enderror
  </div>

  <div class="">
    <button class="btn btn-success" wire:click="store">
      Save
    </button>
    <button class="btn btn-danger" wire:click="$dispatch('webpageContentCreateGalleryCancelled')">
      Cancel
    </button>
  </div>
</div>
