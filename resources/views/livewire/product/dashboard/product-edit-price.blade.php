<div>

  <div class="form-group">
    <input type="text" class="form-control" wire:model="price">
  </div>

  <div>
    @include ('partials.button-update')
    @include ('partials.button-cancel', ['clickEmitEventName' => 'productUpdatePriceCancelled',])
    @include ('partials.dashboard.spinner-button')
  </div>

</div>
