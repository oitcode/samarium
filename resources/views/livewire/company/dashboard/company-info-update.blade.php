<div>
  <div class="mr-3 font-weight-bold">
    <input type="text" wire:model.defer="info_key">
  </div>
  <div>
    <input type="text" wire:model.defer="info_value">
  </div>

  <div>
    <button class="btn btn-success mr-3" wire:click="update">
      Save
    </button>
    <button class="btn btn-danger mr-3" wire:click="$emit('companyInfoUpdateCancelled')">
      Cancel
    </button>
  </div>
</div>
