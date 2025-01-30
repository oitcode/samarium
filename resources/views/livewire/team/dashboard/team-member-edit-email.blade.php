<div>

  <div class="form-group">
    <input type="text" class="form-control" wire:model="email">
  </div>

  <div>
    @include ('partials.button-store')
    @include ('partials.button-cancel', ['clickEmitEventName' => 'teamMemberUpdateEmailCancelled',])
    @include ('partials.dashboard.spinner-button')
  </div>

</div>
