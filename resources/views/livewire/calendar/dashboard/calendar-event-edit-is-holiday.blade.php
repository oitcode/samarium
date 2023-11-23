<div>


  <div class="form-group">
    <select class="form-control-rm" wire:model.defer="is_holiday">
      <option value="yes">Yes</option>
      <option value="no">No</option>
    </select>
  </div>

  <div>
    <button class="btn btn-success mr-2" wire:click="update">
      Save
    </button>
    <button class="btn btn-danger mr-2" wire:click="$emit('calendarEventUpdateIsHolidayCancelled')">
      Cancel
    </button>
  </div>


</div>
