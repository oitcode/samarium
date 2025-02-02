<div>

  <x-create-box-component title="Create todo">
    <div class="form-group">
      <label>Title *</label>
      <input type="text"
          class="form-control"
          wire:model="title">
      @error ('title') <span class="text-danger">{{ $message }}</span> @enderror
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
      @include ('partials.button-cancel', ['clickEmitEventName' => 'exitCreateMode',])
      @include ('partials.dashboard.spinner-button')
    </div>
  </x-create-box-component>

</div>
