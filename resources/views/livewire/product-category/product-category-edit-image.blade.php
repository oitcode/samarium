<div class="p-3">

  <div class="form-group">
    <input type="file" class="form-control" wire:model.live="image">
    @error('image') <span class="text-danger">{{ $message }}</span> @enderror
  </div>

  <div>
    @include ('partials.button-update')
    @include ('partials.button-cancel', ['clickEmitEventName' => 'productCategoryUpdateImageCancelled',])
    @include ('partials.dashboard.spinner-button')
  </div>

</div>
