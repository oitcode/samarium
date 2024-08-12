<div>
  <div class="form-group">
      <label for="">Featured Image</label>
      <input type="file" class="form-control" wire:model.live="new_featured_image">
      @error('featured_image') <span class="text-danger">{{ $message }}</span> @enderror
  </div>

  <div class="my-2">
    <button class="btn btn-success" wire:click="update">
      Save
    </button>

    <button class="btn btn-danger" wire:click="$dispatch('webpageEditFeaturedImageCancel')">
      Cancel
    </button>
  </div>
</div>
