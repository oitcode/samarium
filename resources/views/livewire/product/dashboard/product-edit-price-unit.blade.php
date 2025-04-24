<div>

  <div class="form-group">
    <input type="text" class="form-control" wire:model="selling_price_unit">
  </div>

  <div>
    @include ('partials.button-update')
    @include ('partials.button-cancel', ['clickEmitEventName' => 'productUpdatePriceUnitCancelled',])
    @include ('partials.dashboard.spinner-button')
  </div>

</div>
