<div>

  <div class="form-group">
    <input type="text" class="form-control" wire:model="pan_num">
  </div>

  <div>
    @include ('partials.button-update')
    @include ('partials.button-cancel', ['clickEmitEventName' => 'vendorUpdatePanCancelled',])
    @include ('partials.dashboard.spinner-button')
  </div>

</div>
