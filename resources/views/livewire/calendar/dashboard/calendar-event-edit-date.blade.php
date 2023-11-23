<div>


  <div class="form-group">
    <input type="date" class="form-control" wire:model.defer="start_date">
  </div>

  <div>
    <button class="btn btn-success mr-2" wire:click="update">
      Save
    </button>
    <button class="btn btn-danger mr-2" wire:click="$emit('calendarEventUpdateDateCancelled')">
      Cancel
    </button>
  </div>


</div>
