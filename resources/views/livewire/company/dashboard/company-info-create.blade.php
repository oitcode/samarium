<div class="card">

  <div class="card-body">
    <h3 class="h5 mb-3">
      Create company info
    </h3>
  
    <div class="form-group">
      <label>Key</label>
      <input type="text"
          class="form-control"
          wire:model="info_key">
      @error('info_key') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    <div class="form-group">
      <label>Value</label>
      <input type="text"
          class="form-control"
          wire:model="info_value">
      @error('info_value') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    <div class="form-group">
      <label class="h5">
        Image
        <span class="text-muted ml-1">
        (Optional)
        </span>
      </label>
      <input type="file" class="form-control border-0 pl-0" wire:model.live="image">
      @error('image') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    <div class="mt-4">
      @include ('partials.button-store')
      @include ('partials.button-cancel', ['clickEmitEventName' => 'companyInfoCreateCanceled',])
    </div>
  </div>

</div>
