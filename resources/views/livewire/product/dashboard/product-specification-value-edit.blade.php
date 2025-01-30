<div>

  <div class="form-group">
    <input type="text" class="form-control" wire:model="spec_value">
  </div>

  <div>
    @include ('partials.button-update')
    @include ('partials.button-cancel', ['clickEmitEventName' => 'productSpecificationUpdateValueCancelled',])
    @include ('partials.dashboard.spinner-button')
  </div>

</div>
