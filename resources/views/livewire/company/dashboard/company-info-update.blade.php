<div class="bg-white border p-3">
  <div class="mb-3 font-weight-bold">
    Edit company info
  </div>
  <div class="form-group">
    <label class="font-weight-bold">
      Key
    </label>
    <input type="text" class="form-control" wire:model.defer="info_key">
  </div>
  <div class="form-group">
    <label class="font-weight-bold">
      Value
    </label>
    <input type="text" class="form-control" wire:model.defer="info_value">
  </div>

  <div class="p-3-rm">
    <button class="btn btn-success mr-2" wire:click="update">
      Save
    </button>
    <button class="btn btn-danger" wire:click="$emit('companyInfoUpdateCancelled')">
      Cancel
    </button>
  </div>
</div>
