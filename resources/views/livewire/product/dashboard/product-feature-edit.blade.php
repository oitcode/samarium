<div>

  <div class="form-group">
    <input type="text" class="form-control" wire:model="feature">
  </div>

  <div>
    @include ('partials.button-update')
    @include ('partials.button-cancel', ['clickEmitEventName' => 'productFeatureUpdateCancelled',])
    @include ('partials.dashboard.spinner-button')
  </div>

</div>
