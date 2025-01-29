<div>

  <div class="form-group">
    <label>Heading</label>
    <input type="text" class="form-control" wire:model.live="heading">
  </div>

  <div class="">
    @include ('partials.button-store')
    @include ('partials.button-cancel', ['clickEmitEventName' => 'webpageContentCreateHeadingCancelled',])
    @include ('partials.dashboard.spinner-button')
  </div>

</div>
