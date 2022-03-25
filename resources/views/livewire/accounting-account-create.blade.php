<div class="p-2 border bg-white">

  <div class="form-group">
    <label for="">Name</label>
    <input type="text" class="form-control" wire:model.defer="name">
    @error('name') <span class="text-danger">{{ $message }}</span> @enderror
  </div>

  <button type="submit" class="btn btn-success" wire:click="store">Submit</button>
  <button type="submit" class="btn btn-danger" wire:click="$emit('exitCreateMode')">Cancel</button>

</div>
