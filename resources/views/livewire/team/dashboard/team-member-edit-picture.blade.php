<div>
  <h2 class="h5 font-weight-bold my-3">
    Edit image
  </h2>
  <div class="form-group">
    <input type="file" class="form-control" wire:model.live="image">
    @error('image') <span class="text-danger">{{ $message }}</span> @enderror
  </div>

  <div>
    <button class="btn btn-success mr-2" wire:click="update">
      Save
    </button>
    <button class="btn btn-danger mr-2" wire:click="$dispatch('teamMemberUpdatePictureCancelled')">
      Cancel
    </button>
  </div>
</div>
