<div>
  <div class="form-group">
    <input type="file" class="form-control" wire:model="image">
    @error('image') <span class="text-danger">{{ $message }}</span> @enderror
  </div>

  <div>
    <button class="btn btn-success mr-2" wire:click="update">
      Save
    </button>
    <button class="btn btn-danger mr-2" wire:click="$emit('productCategoryUpdateImageCancelled')">
      Cancel
    </button>
  </div>
</div>
