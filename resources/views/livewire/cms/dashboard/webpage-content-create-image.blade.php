<div>
  <div class="form-group">
    <label for="">Image</label>
    <input type="file" class="form-control" wire:model="image">
    @error('image') <span class="text-danger">{{ $message }}</span> @enderror
  </div>

  <div class="">
    <button class="btn btn-success" wire:click="store">
      Save
    </button>
    <button class="btn btn-danger" wire:click="$emit('webpageContentCreateImageCancelled')">
      Cancel
    </button>
  </div>
</div>
