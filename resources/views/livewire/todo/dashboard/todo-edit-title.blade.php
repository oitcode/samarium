<div>


  <div class="form-group">
    <input type="text" class="form-control" wire:model="title">
  </div>

  <div>
    @include ('partials.button-update')
    @include ('partials.button-cancel', ['clickEmitEventName' => 'todoUpdateTitleCancelled',])
  </div>


</div>
