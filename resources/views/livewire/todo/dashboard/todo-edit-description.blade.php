<div>

  <div class="form-group">
    <input type="text" class="form-control" wire:model="description">
  </div>

  <div>
    @include ('partials.button-update')
    @include ('partials.button-cancel', ['clickEmitEventName' => 'todoUpdateDescriptionCancelled',])
  </div>

</div>
