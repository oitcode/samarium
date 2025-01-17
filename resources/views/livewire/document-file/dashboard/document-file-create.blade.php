<div class="card shadow-sm">


  <div class="card-body p-3">

    <h1 class="h5 o-heading mb-4">
      Create file
    </h1>

    <div class="form-group">
      <label>Name *</label>
      <input type="text" class="form-control" wire:model="name">
      @error ('name') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    <div class="form-group">
      <label>File *</label>
      <input type="file" class="form-control" wire:model.live="document_file">
      @error ('document_file') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    <div class="form-group">
      <label>Description</label>
      <input type="text"
          class="form-control"
          wire:model="description">
      @error ('description') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    <div class="py-3 m-0">

      @include ('partials.button-store')
      @include ('partials.button-cancel', ['clickEmitEventName' => 'documentFileCreateCancelled',])

      <button wire:loading class="btn">
        <span class="spinner-border text-info mr-3" role="status">
        </span>
      </button>
    </div>
  </div>


</div>
