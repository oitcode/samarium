<div>

    <div class="form-group">
      <select class="form-control" wire:model.defer="visibility">
        <option value="---">---</option>
        <option value="private">Private</option>
        <option value="public">Public</option>
      </select>
      @error ('visibility')
        <div class="text-danger">
          {{ $message }}
        </div>
      @enderror
    </div>

    <div class="my-3">
      <button class="btn btn-sm btn-success" wire:click="update">
        Save
      </button>
      <button class="btn btn-sm btn-danger" wire:click="$emit('webpageEditVisibilityCancel')">
        Cancel
      </button>
    </div>
</div>
