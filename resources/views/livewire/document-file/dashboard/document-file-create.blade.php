<div>

  <x-create-box-component title="Create file">
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
      @include ('partials.dashboard.spinner-button')
    </div>
  </x-create-box-component>

</div>
