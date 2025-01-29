<div>

  <div class="form-group">
    <select class="form-control" wire:model="visibility">
      <option value="---">---</option>
      <option value="private">Private</option>
      <option value="public">Public</option>
    </select>
    @error ('visibility')
      <div class="text-danger">
        {{ $message }}
      </div>
    @enderror
  </div>

  <div class="my-3">
    @include ('partials.button-store')
    @include ('partials.button-cancel', ['clickEmitEventName' => 'webpageEditVisibilityCancel',])
    @include ('partials.dashboard.spinner-button')
  </div>

</div>
