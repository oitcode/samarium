<div>


  <div class="form-group">
    <select class="form-control-rm" wire:model="is_holiday">
      <option value="yes">Yes</option>
      <option value="no">No</option>
    </select>
  </div>

  <div>
    @include ('partials.button-update')
    @include ('partials.button-cancel', ['clickEmitEventName' => 'calendarEventUpdateIsHolidayCancelled',])
    @include ('partials.spinner-border')
  </div>


</div>
