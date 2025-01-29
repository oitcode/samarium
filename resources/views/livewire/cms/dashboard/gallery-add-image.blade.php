<div class="p-2 border">

  <div class="form-group">
    <label>Images</label>
    <input type="file" class="form-control" wire:model.live="images" multiple>
    @error('images') <span class="text-danger">{{ $message }}</span> @enderror
  </div>

  <div>
    <button class="btn btn-sm btn-success mr-3" wire:click="store">Save</button>
    <button class="btn btn-sm btn-secondary" wire:click="$dispatch('addGalleryImagesCancelled')">Cancel</button>
    @include ('partials.dashboard.spinner-button')
  </div>

</div>
