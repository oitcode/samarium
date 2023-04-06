<div>
  <div class="form-group">
    <input type="text" class="form-control" wire:model.defer="name" />
  </div>
  <div class="my-3">
    <button class="btn btn-success mr-3" wire:click="store">
      Save
    </button>
    <button class="btn btn-danger mr-3" wire:click="$emit('updateGalleryNameCancel')">
      Cancel
    </button>
  </div>
</div>
