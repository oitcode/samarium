<div>

  <div class="p-3">
    <h1 class="h5 font-weight-bold mb-4">
      Edit video link
    </h1>

    <div class="form-group">
      <input type="text" class="form-control" wire:model.defer="video_link">
    </div>

    <div>
      @include ('partials.button-update')
      @include ('partials.button-cancel', ['clickEmitEventName' => 'productUpdateVideoLinkCancelled',])
    </div>
  </div>


</div>
