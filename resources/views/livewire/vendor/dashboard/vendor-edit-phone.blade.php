<div>

  <div class="form-group">
    <input type="text" class="form-control" wire:model="phone">
  </div>

  <div>
    @include ('partials.button-update')
    @include ('partials.button-cancel', ['clickEmitEventName' => 'vendorUpdatePhoneCancelled',])
    @include ('partials.dashboard.spinner-button')
  </div>

</div>
