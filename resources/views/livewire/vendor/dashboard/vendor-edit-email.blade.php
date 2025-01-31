<div>

  <div class="form-group">
    <input type="text" class="form-control" wire:model="email">
  </div>

  <div>
    @include ('partials.button-update')
    @include ('partials.button-cancel', ['clickEmitEventName' => 'vendorUpdateEmailCancelled',])
    @include ('partials.dashboard.spinner-button')
  </div>

</div>
