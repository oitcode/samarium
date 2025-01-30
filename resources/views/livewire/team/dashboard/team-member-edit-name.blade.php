<div>

  <div class="form-group">
    <input type="text" class="form-control" wire:model="name">
  </div>

  <div>
    @include ('partials.button-store')
    @include ('partials.button-cancel', ['clickEmitEventName' => 'teamMemberUpdateNameCancelled',])
    @include ('partials.dashboard.spinner-button')
  </div>

</div>
