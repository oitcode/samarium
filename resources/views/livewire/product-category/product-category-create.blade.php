<div class="card shadow-sm">


  <div class="card-body">

    <h1 class="h5 mb-4 o-heading">
      Create product category
    </h1>

    <div class="form-group mb-4">
      <label class="h5">Name *</label>
      <input type="text"
          class="form-control shadow-sm"
          wire:model="name">
      @error ('name') <span class="text-danger">{{ $message }}</span> @enderror
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

    <div class="py-3 m-0">

      @include ('partials.button-store')
      @include ('partials.button-cancel', ['clickEmitEventName' => 'productCategoryCreateCancelled',])

      <button wire:loading class="btn">
        <span class="spinner-border text-info mr-3" role="status">
        </span>
      </button>
    </div>
  </div>


</div>
