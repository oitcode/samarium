<div>

  <div class="form-group">
    <input type="text" class="form-control" wire:model="name" />
  </div>
  <div class="my-3">
    @include ('partials.button-store')
    @include ('partials.button-cancel', ['clickEmitEventName' => 'updateGalleryNameCancel',])
    @include ('partials.dashboard.spinner-button')
  </div>

</div>
