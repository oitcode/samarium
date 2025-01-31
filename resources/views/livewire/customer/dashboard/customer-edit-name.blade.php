<div>

  <div class="form-group">
    <input type="text" class="form-control" wire:model="name">
  </div>

  <div>
    @include ('partials.button-update')
    @include ('partials.button-cancel', ['clickEmitEventName' => 'customerUpdateNameCancelled',])
    @include ('partials.dashboard.spinner-button')
  </div>

</div>
