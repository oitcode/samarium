<div class="p-2 border">

  <div class="form-group">
    <label>Images</label>
    <input type="file" class="form-control" wire:model="images" multiple>
    @error('images') <span class="text-danger">{{ $message }}</span> @enderror
  </div>

  <div>
    <button class="btn btn-sm btn-success mr-3" wire:click="store">Save</button>
    <button class="btn btn-sm btn-secondary" wire:click="$emit('addGalleryImagesCancelled')">Cancel</button>
    <button wire:loading class="btn">
      <span class="spinner-border text-info mr-3" role="status">
      </span>
    </button>
  </div>

</div>
