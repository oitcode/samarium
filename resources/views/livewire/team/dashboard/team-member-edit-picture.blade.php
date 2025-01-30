<div>

  <h2 class="h5 font-weight-bold my-3">
    Edit image
  </h2>

  <div class="form-group">
    <input type="file" class="form-control" wire:model.live="image">
    @error('image') <span class="text-danger">{{ $message }}</span> @enderror
  </div>

  <div>
    @include ('partials.button-update')
    @include ('partials.button-cancel', ['clickEmitEventName' => 'teamMemberUpdatePictureCancelled',])
    @include ('partials.dashboard.spinner-button')
  </div>

</div>
