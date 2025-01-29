<div>

  <div class="form-group">
    <label>Featured Image</label>
    <input type="file" class="form-control" wire:model.live="new_featured_image">
    @error('featured_image') <span class="text-danger">{{ $message }}</span> @enderror
  </div>

  <div class="my-2">
    @include ('partials.button-store')
    @include ('partials.button-cancel', ['clickEmitEventName' => 'webpageEditFeaturedImageCancel',])
    @include ('partials.dashboard.spinner-button')
  </div>

</div>
