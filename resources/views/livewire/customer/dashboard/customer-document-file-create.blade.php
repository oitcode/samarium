<div class="card shadow-sm">

  <div class="card-body p-3">
    <h1 class="h5 font-weight-bold mb-4">
      Create customer document file
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

    <div class="py-3 m-0">
      @include ('partials.button-store')
      @include ('partials.button-cancel', ['clickEmitEventName' => 'customerDocumentFileCreateCancelled',])
      @include ('partials.dashboard.spinner-button')
    </div>
  </div>

</div>
