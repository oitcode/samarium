<div>

  <div class="p-3">
    <h1 class="h5 font-weight-bold mb-4">
      Create product gallery
    </h1>

    <div class="form-group">
      <label>Images *</label>
      <input type="file" class="form-control" wire:model.live="images" multiple>
      @error('images') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    <div class="py-3">
    @include ('partials.button-store')
    @include ('partials.button-cancel', ['clickEmitEventName' => 'createProductGalleryCancelled',])
    </div>
  </div>

</div>
