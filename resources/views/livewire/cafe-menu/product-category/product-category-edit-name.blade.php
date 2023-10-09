<div class="p-3 bg-white">
  <div class="form-group">
    <input type="text" class="form-control" wire:model.defer="name">
  </div>

  <div>
    <button class="btn btn-success mr-2" wire:click="update">
      Save
    </button>
    <button class="btn btn-danger mr-2" wire:click="$emit('productCategoryUpdateNameCancelled')">
      Cancel
    </button>
  </div>
</div>
