<div class="card">
  <div class="card-body">
  
    <h3 class="h5">Create new expense category</h3>
  
    <div class="form-group">
      <label for="">Category name</label>
      <input type="text" class="form-control" wire:model.defer="name">
      @error('name') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
  
    <button type="submit" class="btn btn-primary" wire:click="store">Submit</button>
    <button type="submit" class="btn btn-danger" wire:click="$emit('exitCategoryCreateMode')">Cancel</button>
  
  </div>
</div>
