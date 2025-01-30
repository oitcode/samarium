<div>

  <div class="form-group">
    <input type="text" class="form-control" wire:model="phone">
  </div>

  <div>
    @include ('partials.button-store')
    @include ('partials.button-cancel', ['clickEmitEventName' => 'teamMemberUpdatePhoneCancelled',])
    @include ('partials.dashboard.spinner-button')
  </div>

</div>
