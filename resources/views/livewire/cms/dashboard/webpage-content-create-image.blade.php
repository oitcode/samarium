<div>

  <div class="form-group">
    <label for="">Image</label>
    <input type="file" class="form-control" wire:model.live="image">
    @error('image') <span class="text-danger">{{ $message }}</span> @enderror
  </div>

  <div>
    @include ('partials.button-store')
    @include ('partials.button-cancel', ['clickEmitEventName' => 'webpageContentCreateImageCancelled',])
    @include ('partials.dashboard.spinner-button')
  </div>

</div>
