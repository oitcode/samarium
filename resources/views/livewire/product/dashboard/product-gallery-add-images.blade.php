<div>

  <div class="p-3">
    <h2 class="h5 font-weight-bold mb-4">
      Add images
    </h2>
  
    <div class="form-group">
      <label>Images *</label>
      <input type="file" class="form-control" wire:model.live="new_images" multiple>
      @error ('new_images') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
  
    <div class="py-3">
      <button class="btn btn-success" wire:click="addNewImages">
        Save
      </button>
      @include ('partials.button-cancel', ['clickEmitEventName' => 'addProductGalleryImagesCancelled',])
      @include ('partials.dashboard.spinner-button')
    </div>
  </div>

</div>
